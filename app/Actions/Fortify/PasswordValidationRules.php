<?php
namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules{
	
	/* magset ng password rules na ang requirements ay:*/
	/* min isang capital letter, number at special character*/
    protected function passwordRules(){
        return ['required', 
				'string', 
				(new Password)->requireUppercase()->requireNumeric()->requireSpecialCharacter(), 
				'confirmed'];
    }
}
