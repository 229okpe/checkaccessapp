<?php

namespace App\Rules;

use Illuminate\Validation\Rule;
use App\Models\access;  

class UniqueNamePerDay extends Rule
{
    public function passes($attribute, $value)
    {
        // Vérifie si le nom a déjà été ajouté aujourd'hui
        return access::where('name', $value)
            ->whereDate('created_at', now()->toDateString())
            ->exists();
    }

    public function message()
    {
        return 'Vous avez déja marqué votre présence pour ce cours ! Veuillez attendre le prochain cours';
    }
}
