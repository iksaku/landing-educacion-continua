<?php

namespace App\Http\Components;

use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Radio\Concerns\WithEvents;
use Radio\Radio;

class CourseRegistration
{
    use Radio;
    use WithEvents;

    public array $data = [
        'course_id' => null,
        'name' => null,
        'email' => null,
        'age' => null,
        'phone' => null,
    ];

    public function register(): void
    {
        Validator::validate($this->data, [
            'course_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer', 'min:1'],
            'phone' => ['required', 'string']
        ], [
            'course_id' => [
                'required' => 'Por favor ingresa el ID del curso al cual te deseas registrar.',
                'integer' => 'No se ha encontrado el curso solicitado.'
            ],
            'name' => [
                'required' => 'Por favor ingrese su nombre completo.',
                'string' => 'Por favor ingrese su nombre completo.',
            ],
            'email' => [
                'required' => 'Por favor ingrese su correo electrónico.',
                'email' => 'El correo es inválido, por favor ingrese un correo válido.',
            ],
            'age' => [
                'required' => 'Por favor ingrese su edad.',
                'integer' => 'Por favor ingrese una edad válida.',
                'min' => 'Por favor ingrese una edad válida.',
            ],
            'phone' => [
                'required' => 'Por favor ingrese su número telefónico.',
                'string' => 'Por favor ingrese su número telefónico.',
            ],
        ]);

        $course = Course::find($this->data['course_id']);

        if ($course === null) {
            throw ValidationException::withMessages([
                'course_id' => ['No se ha encontrado el curso solicitado']
            ]);
        }

        $registration = $course->registrations()->firstOrNew(
            ['email' => $this->data['email']],
            array_intersect_key(
                $this->data,
                array_flip(['name', 'age', 'phone'])
            )
        );

        if ($registration->exists) {
            throw ValidationException::withMessages([
                'email' => ['Ya se ha registrado este email anteriormente para tomar el curso.']
            ]);
        }

        $registration->save();

        $this->dispatchEvent('successful-registration');
    }
}
