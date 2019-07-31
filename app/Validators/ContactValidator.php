<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ContactValidator.
 *
 * @package namespace App\Validators;
 */
class ContactValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required|min:3',
            'sobrenome' => 'required|min:3',
            'email' => 'required|unique:contacts|min:3',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required|min:3',
            'sobrenome' => 'required|min:3',
        ],
    ];
}
