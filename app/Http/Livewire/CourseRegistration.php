<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\CourseRegistration as Registration;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CourseRegistration extends Component
{
    public ?int $course_id = null;
    public Registration $registration;

    public function mount(): void
    {
        $this->registration = Registration::make();
    }

    protected array $rules = [
        'course_id' => ['required', 'integer'],
        'registration.name' => ['required', 'string'],
        'registration.email' => ['required', 'email'],
        'registration.age' => ['required', 'integer', 'min:1'],
        'registration.phone' => ['required', 'string'],
    ];

    public function register(): void
    {
        $this->validate(messages: [
            'course_id' => [
                'required' => 'Por favor ingresa el ID del curso al cual te deseas registrar.',
                'integer' => 'No se ha encontrado el curso solicitado.'
            ],
            'registration.name' => [
                'required' => 'Por favor ingrese su nombre completo.',
                'string' => 'Por favor ingrese su nombre completo.',
            ],
            'registration.email' => [
                'required' => 'Por favor ingrese su correo electrónico.',
                'email' => 'El correo es inválido, por favor ingrese un correo válido.',
            ],
            'registration.age' => [
                'required' => 'Por favor ingrese su edad.',
                'integer' => 'Por favor ingrese una edad válida.',
                'min' => 'Por favor ingrese una edad válida.',
            ],
            'registration.phone' => [
                'required' => 'Por favor ingrese su número telefónico.',
                'string' => 'Por favor ingrese su número telefónico.',
            ],
        ]);

        $course = Course::find($this->course_id);

        if ($course === null) {
            throw ValidationException::withMessages([
                'course_id' => ['No se ha encontrado el curso solicitado']
            ]);
        }

        if ($course->registrations()->whereEmail($this->registration->email)->exists()) {
            throw ValidationException::withMessages([
                'email' => ['Ya se ha registrado este email anteriormente para tomar el curso.']
            ]);
        }

        $course->registrations()->save($this->registration);
        $this->registration = Registration::make();

        $this->dispatchBrowserEvent('successful-registration');
    }

    public function render(): View
    {
        return view('livewire.course-registration');
    }
}
