<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCourses();
    }

    protected function seedCourses(): void
    {
        $data = [
            'Diplomados' => [
                [
                    'name' => 'Diplomado en Automatización',
                    'description' => 'Desarrolla las habilidades de generación de arquitecturas de control y programación de PLC\'s en lenguaje escalera y función de bloques, variadores de velocidad en aplicaciones de bombas, ventiladores y configuración de pantallas de operación conocidas en la industria como HMIs.',
                    'image' => 'WjOWazUPAss',
                    'duration' => '90',
                    'cost_for_students' => 5_000,
                    'cost_for_non_students' => 6_500,
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '08:00',
                            'ends_at' => '13:00'
                        ],
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '13:00',
                            'ends_at' => '18:00'
                        ],
                    ],
                ],
                [
                    'name' => 'Diplomado en Base de Datos',
                    'description' => 'Aprende a utilizar métodos, herramientas y técnicas para el diseño y creación de bases de datos. Se realizarán tareas de análisis y modelado, en bases de datos tanto relacionales como distribuidas.',
                    'image' => '7lryofJ0H9s',
                    'duration' => '90',
                    'cost_for_students' => 5_000,
                    'cost_for_non_students' => 6_500,
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00'
                        ],
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:00',
                            'ends_at' => '19:00'
                        ],
                        [
                            'day' => Carbon::SUNDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00'
                        ],
                    ],
                ],
                [
                    'name' => 'Diplomado en Calidad Total y Mejora Continua',
                    'description' => 'Aprenderás los conceptos básicos del model de calidad total y de las herramientas de análisis en el desarrollo de proyectos de mejora continua para su correcta aplicación en el ámbito laboral.',
                    'image' => 'i4ABHj811N0',
                    'duration' => '75',
                    'cost_for_students' => 5_000,
                    'cost_for_non_students' => 6_500,
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '08:00',
                            'ends_at' => '13:00'
                        ],
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:00',
                            'ends_at' => '19:00'
                        ],
                    ],
                ],
                [
                    'name' => 'Diplomado en Herramientas de Diseño',
                    'description' => 'Desarrolla habilidades y conocimientos necesarios para utilizar herramientas de software de forma eficiente, permitiéndote realizar diseños 2D, interpretar y crear planos detallados, así como modelar piezas 3D y generar ensambles mediante ejemplos enfocados en el área de la ingeniería mecánica.',
                    'image' => 'fJebhGIP0P4',
                    'duration' => '120',
                    'cost_for_students' => 6_500,
                    'cost_for_non_students' => 8_500,
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00'
                        ],
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:00',
                            'ends_at' => '19:00'
                        ],
                        [
                            'day' => Carbon::SUNDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00'
                        ],
                    ],
                ],
                [
                    'name' => 'Diplomado en ITIL',
                    'description' => 'Conoce y aplica la metodología ITIL, utilizando un conjunto de mejores prácticas recomendadas a nivel global para el diseño, entrega y soporte, enfocados a la gestión de procesos para la administración de servicios, aplicables en diversas áreas de IT.',
                    'image' => 'v89zhr0iBFY',
                    'duration' => '45',
                    'cost_for_students' => 5_000,
                    'cost_for_non_students' => 6_500,
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00',
                        ],
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:00',
                            'ends_at' => '19:00',
                        ],
                    ],
                ],
            ],
            'Educación Técnica' => [
                [
                    'name' => '',
                    'description' => '',
                    'image' => '',
                    'duration' => '',
                    'cost_for_students' => 0,
                    'cost_for_non_students' => 0,
                    'schedules' => [],
                ],
                [
                    'name' => '',
                    'description' => '',
                    'image' => '',
                    'duration' => '',
                    'cost_for_students' => 0,
                    'cost_for_non_students' => 0,
                    'schedules' => [],
                ],
                [
                    'name' => '',
                    'description' => '',
                    'image' => '',
                    'duration' => '',
                    'cost_for_students' => 0,
                    'cost_for_non_students' => 0,
                    'schedules' => [],
                ],
                [
                    'name' => '',
                    'description' => '',
                    'image' => '',
                    'duration' => '',
                    'cost_for_students' => 0,
                    'cost_for_non_students' => 0,
                    'schedules' => [],
                ],
                [
                    'name' => '',
                    'description' => '',
                    'image' => '',
                    'duration' => '',
                    'cost_for_students' => 0,
                    'cost_for_non_students' => 0,
                    'schedules' => [],
                ],
                [
                    'name' => '',
                    'description' => '',
                    'image' => '',
                    'duration' => '',
                    'cost_for_students' => 0,
                    'cost_for_non_students' => 0,
                    'schedules' => [],
                ],
            ],
        ];

        foreach ($data as $typeName => $courses) {
            $type = CourseType::firstOrCreate([
                'name' => $typeName,
            ]);

            foreach ($courses as $courseData) {
                /** @var Course $course */
                $course = $type->courses()->create([
                    'name' => $courseData['name'],
                    'description' => $courseData['description'],
                    'image' => $courseData['image'],
                    'duration' => $courseData['duration'],
                    'cost_for_students' => $courseData['cost_for_students'],
                    'cost_for_non_students' => $courseData['cost_for_non_students'],
                ]);

                $course->schedules()->createMany($courseData['schedules']);
            }
        }
    }
}
