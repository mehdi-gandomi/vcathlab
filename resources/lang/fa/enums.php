<?php

use Modules\User\Enums\Profession;
use Modules\User\Enums\Specialty;

return [
    Profession::class=>[
        Profession::Fellow=>"Fellow",
        Profession::MedicalStudent=>"Medical Student",
        Profession::Physician=>"Physician",
        Profession::PhysicianAssistant=>"Physician Assistant",
        Profession::Resident=>"Resident",
        Profession::Other=>"Other",
    ],
    Specialty::class=>[
        Specialty::GeneralCardiologist =>"General Cardiologist",
        Specialty::InterventionalCardiologist =>"Interventional Cardiologist",
        Specialty::InterventionalRadilogist =>"Interventional Radilogist",
        Specialty::Interventionalelectrophysiologist =>"Interventional electro physiologist",
        Specialty::Other =>"Other"
    ],
];
