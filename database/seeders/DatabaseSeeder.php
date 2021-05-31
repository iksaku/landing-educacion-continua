<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\CourseType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCourses();

        // Default admin account.
        User::factory([
            'email' => 'admin@example.com'
        ])->create();
    }

    protected function seedCourses(): void
    {
        $data = [
            'Diplomados' => [
                [
                    'name' => 'Diplomado en Automatización',
                    'description' => 'Desarrolla las habilidades de generación de arquitecturas de control y programación de PLC\'s en lenguaje escalera y función de bloques, variadores de velocidad en aplicaciones de bombas, ventiladores y configuración de pantallas de operación conocidas en la industria como HMIs.',
                    'image' => 'WjOWazUPAss',
                    'duration' => '90 horas',
                    'costs' => [
                        'Alumnos UANL' => 5_000,
                        'Externos' => 6_500,
                    ],
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
                    'duration' => '90 horas',
                    'costs' => [
                        'Alumnos UANL' => 5_000,
                        'Externos' => 6_500,
                    ],
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
                    'duration' => '75 horas',
                    'costs' => [
                        'Alumnos UANL' => 5_000,
                        'Externos' => 6_500,
                    ],
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
                    'duration' => '120 horas',
                    'costs' => [
                        'Alumnos UANL' => 6_500,
                        'Externos' => 8_500,
                    ],
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
                    'duration' => '45 horas',
                    'costs' => [
                        'Alumnos UANL' => 5_000,
                        'Externos' => 6_500,
                    ],
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
                    'name' => 'Técnico Automotriz y Diesel',
                    'description' => 'Comprende los sistemas involucrados en el funcionamiento de vehículos a gasolina y diésel, con lo cual podras diagnosticar fallas y realizar mantenimiento de manera correcta, seleccionando las herramientas, instrumentos y equipos adecuados para el desarrollo óptimo de su actividad.',
                    'image' => '2K_-PG95qlI',
                    'duration' => '1 año y medio',
                    'costs' => [
                        'Inscripción' => 500,
                        'Módulo' => 1_500
                    ],
                    'schedules' => [
                        [
                            'day' => Carbon::SUNDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00',
                        ],
                    ],
                ],
                [
                    'name' => 'Técnico en Control Numérico y Computarizado',
                    'description' => 'Desarrolla la capacidad de interpretar diseños y utilizar herramientas CAD/CAM, de igual manera, aprenderás de programación de máquinas CNC para su correcta operación.',
                    'image' => 'KhmfoQEindg',
                    'duration' => '1 año',
                    'costs' => [
                        'Inscripción' => 500,
                        'Módulo' => 1_500,
                    ],
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:30',
                            'ends_at' => '19:30',
                        ],
                        [
                            'day' => Carbon::SUNDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00',
                        ]
                    ],
                ],
//                [
//                    'name' => 'Técnico en Paquetería Computacional',
//                    'description' => '',
//                    'image' => '',
//                    'duration' => '',
//                    'costs' => [],
//                    'schedules' => [],
//                ],
                [
                    'name' => 'Técnico en Refrigeración y Calefacción Industrial',
                    'description' => 'Comprende los conceptos de calefacción, ventilación, refrigeración y aire acondicionado, necesario para realizar procedimientos de reparación y mantenimiento de equipos con aplicación comercial e industrial.',
                    'image' => 'ymMaSAt-ias',
                    'duration' => '1 año',
                    'costs' => [
                        'Inscripción' => 500,
                        'Módulo' => 1_500,
                    ],
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:30',
                            'ends_at' => '19:30',
                        ],
                        [
                            'day' => Carbon::SUNDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00',
                        ],
                    ],
                ],
//                [
//                    'name' => 'Técnico Desarrollador de Software',
//                    'description' => '',
//                    'image' => '',
//                    'duration' => '',
//                    'costs' => [],
//                    'schedules' => [],
//                ],
                [
                    'name' => 'Técnico Industrial en Electricidad y Electrónica Especializada',
                    'description' => 'Obtén los conocimientos requeridos para analizar fallas, realizar actividades de reparación y mantenimiento comercial e industrial siguiendo las normas de seguridad vigentes.',
                    'image' => 'fW6lwDM26o0',
                    'duration' => '1 año',
                    'costs' => [
                        'Inscripción' => 500,
                        'Módulo' => 1_500,
                    ],
                    'schedules' => [
                        [
                            'day' => Carbon::SATURDAY,
                            'starts_at' => '14:30',
                            'ends_at' => '19:30',
                        ],
                        [
                            'day' => Carbon::SUNDAY,
                            'starts_at' => '09:00',
                            'ends_at' => '14:00',
                        ],
                    ],
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
                    'costs' => $courseData['costs'],
                ]);

                $course->schedules()->createMany($courseData['schedules']);

                CourseRegistration::factory()
                    ->count(5)
                    ->for($course)
                    ->create();
            }
        }
    }
}
