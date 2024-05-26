<?php
$cours = [
    'Dimanche' => [
        ['08:30', '10:00', 'Algorithmique'],
        ['10:00', '11:30', 'Anglais'],
        ['12:30', '15:30', 'Francais'], // dure 2 sessions
    ],
    'Lundi' => [
        ['08:30', '10:00', 'Algorithmique'],
        ['10:00', '11:30', 'Informatique'],
        ['12:30', '15:30', 'Conception base de données'], // dure 2 sessions
    ],
    // ajoutez plus de jours et de cours ici
];

$horaires = ['08:30-10:00', '10:00-11:30', '12:30-14:00', '14:00-15:30'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Planning des cours</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Planning des cours</h1>
    <table>
        <tr>
            <th></th>
            <!-- Cellule vide en haut à gauche -->
            <?php foreach ($horaires as $horaire) : ?>
                <th><?php echo $horaire; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($cours as $jour => $creneaux) : ?>
            <tr>
                <td><?php echo $jour; ?></td>
                <?php
                // Step through timeslots using index to control colspan
                for ($i = 0; $i < count($horaires);) :
                    $horaire = $horaires[$i];
                    $coursPourCetteHeure = '';
                    $colspan = 1;
                    foreach ($creneaux as $creneau) {
                        list($hDebutCours, $mDebutCours) = explode(':', $creneau[0]);
                        list($hFinCours, $mFinCours) = explode(':', $creneau[1]);
                        list($hDebut, $mDebut) = explode(':', explode('-', $horaire)[0]);
                        $horaireEnMinutes = $hDebut * 60 + $mDebut;
                        $debutCoursEnMinutes = $hDebutCours * 60 + $mDebutCours;
                        $finCoursEnMinutes = $hFinCours * 60 + $mFinCours;
                        // Check if current course falls within this timeslot
                        if ($debutCoursEnMinutes <= $horaireEnMinutes && $finCoursEnMinutes > $horaireEnMinutes) {
                            $coursPourCetteHeure = $creneau[2];
                            // Calculate colspan as duration in sessions of 1.5hrs, assumes all classes and timeslots are 1.5hrs long
                            $colspan = ($finCoursEnMinutes - $debutCoursEnMinutes) / 90;
                            $i += $colspan;  // step forward for number of sessions
                            break;
                        }
                    }
                    if (!$coursPourCetteHeure || $colspan == 1) {
                        $i += 1; // step forward for one session
                    }
                    echo "<td colspan=\"{$colspan}\">$coursPourCetteHeure</td>";
                endfor;
                ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>