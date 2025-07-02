<?php

namespace App\Services\SignUp;

use App\Services\AuthMagicLink\Contracts\MagicLinkServiceContract;
use App\Services\SignUp\Contracts\SignUpServiceContract;
use App\Services\SignUp\Contracts\SignUpUserFactoryContract;
use App\Services\SignUp\DTO\Requests\SignUpRequestDTO;
use App\Services\SignUp\DTO\SignUpDTO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class SignUpService implements SignUpServiceContract
{
    public function __construct(
        protected SignUpUserFactoryContract $signUpUserFactory,
        protected MagicLinkServiceContract $magicLinkService
    ) {

    }

    /**
     * @throws Throwable
     */
    public function signUp(SignUpRequestDTO $requestDTO): SignUpDTO
    {
        DB::beginTransaction();

        try {
            // can be move service to context and use repository for save
            $newUser = $this->signUpUserFactory->createUser($requestDTO);
            $newUser->save();

            // can be use event with listeners after created used (option)
            $magicLink = $this->magicLinkService->createUserAuthToken($newUser->id);

            DB::commit();
        } catch (Throwable $exception) {
            Log::critical($exception->getMessage(), $requestDTO->toArray());
            DB::rollBack();
            throw $exception;
        }

        return new SignUpDTO(
            userId: $newUser->id,
            username: $newUser->username,
            magicLink: $magicLink->token
        );
    }
}
