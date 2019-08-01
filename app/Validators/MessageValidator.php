<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MessageValidator.
 *
 * @package namespace App\Validators;
 */
class MessageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'contact_id' => 'required',
            'descricao' => 'required|min:3',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'contact_id' => 'required',
            'descricao' => 'required|min:3',
        ],
    ];
}
