<?php

use Illuminate\Database\Seeder;
use App\mailBox\Model\Mail;

class mailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $mail = new Mail();

        $mail->insert(array(
            [
                'uid' => 21,
                'sender' => 'Ernest Hemingway',
                'subject' => 'animals',
                'message' => 'This is a tale about nihilism. The story is about a combative nuclear engineer who hates animals. It starts in a ghost town on a world of forbidden magic. The story begins with a legal dispute and ends with a holiday celebration.',
                'time_sent' => 1459239867,
                'created_at' => date('Y-m-d  h:i:s'),
                'updated_at' => date('Y-m-d  h:i:s')

            ],
            [
                'uid' => 22,
                'sender' => 'Stephen King',
                'subject' => 'adoration',
                'message' => 'The story is about a fire fighter, a naive bowman, a greedy fisherman, and a clerk who is constantly opposed by a heroine. It takes place in a small city. The critical element of the story is an adoration.',
                'time_sent' => 1459248747,
                'created_at' => date('Y-m-d  h:i:s'),
                'updated_at' => date('Y-m-d  h:i:s')

            ],
            [
                'uid' => 23,
                'sender' => 'Virgina Woolf',
                'subject' => 'debt',
                'message' => 'The story is about an obedient midwife and a graceful scuba diver who is in debt to a fence. It takes place in a magical part of our universe. The story ends with a funeral.',
                'time_sent' => 1456767867,
                'created_at' => date('Y-m-d  h:i:s'),
                'updated_at' => date('Y-m-d  h:i:s')

            ],
            [
                'uid' => 24,
                'sender' => 'George Orwell',
                'subject' => 'chemist',
                'message' => 'This is a tale about degeneracy. The story is about a chemist. It takes place in a manufacturing city. The story begins with growth.',
                'time_sent' => 1456744407,
                'created_at' => date('Y-m-d  h:i:s'),
                'updated_at' => date('Y-m-d  h:i:s')

            ],
            [
                'uid' => 25,
                'sender' => 'James Joyc',
                'subject' => 'nuclear engineer',
                'message' => 'This is a tale about degeneracy. The story is about a chemist. It takes place in a manufacturing city. The story begins with growth.',
                'time_sent' => 1456733427,
                'created_at' => date('Y-m-d  h:i:s'),
                'updated_at' => date('Y-m-d  h:i:s')

            ],
            [
                'uid' => 26,
                'sender' => 'Jane Austen',
                'subject' => 'treasure-hunter',
                'message' => 'The story is about a treasure-hunter and a treasure-hunter who is constantly annoyed by a misguided duke. It takes place on a forest planet in a galaxy-spanning commonwealth. The critical element of the story is a door being opened',
                'time_sent' => 1456730427,
                'created_at' => date('Y-m-d  h:i:s'),
                'updated_at' => date('Y-m-d  h:i:s')

            ]
        ));
    }
}
