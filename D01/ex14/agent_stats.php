#!/usr/bin/php
<?php
if ($argc == 2) {
    $total = 0;
    $occurence = 0;
    $line = array();
    $user = array();
    fgets(STDIN);
    while ($lstdin = fgets(STDIN)) {
        $stat = explode(";", $lstdin);
        if (count($stat) == 4) {
            $line[] = $stat;
            if (!isset($user[$stat[0]])) {
                $user[$stat[0]]['name'] = $stat[0];
                $user[$stat[0]]['occurence'] = 0;
                $user[$stat[0]]['total'] = 0;
                $user[$stat[0]]['mouli'] = 0;
            }
        }
    }
    ksort($user);
    if ($argv[1] == 'moyenne') {
        foreach ($line as $key) {
            if ($key[1] != '' && $key[2] != 'moulinette') {
                $total += $key[1];
                $occurence++;
            }
        }
        $moyenne = $total / $occurence;
        echo $moyenne."\n";
    }
    else if ($argv[1] == 'moyenne_user') {
        foreach ($line as $key) {
            if ($key[1] != '' && $key[2] != 'moulinette') {
                $user[$key[0]]['occurence'] += 1;
                $user[$key[0]]['total'] += $key[1];
            }
        }
        foreach ($user as $stud) {
            $moyenne = $stud['total'] / $stud['occurence'];
            echo $stud['name'].":".$moyenne."\n";
        }
    }
    else if ($argv[1] == 'ecart_moulinette') {
        foreach ($line as $key) {
            if ($key[1] != '' && $key[2] != 'moulinette') {
                $user[$key[0]]['occurence'] += 1;
                $user[$key[0]]['total'] += $key[1];
            }
            else if ($key[2] == 'moulinette') {
                $user[$key[0]]['mouli'] = $key[1];
            }
        }
        foreach ($user as $stud) {
            $moyenne = $stud['total'] / $stud['occurence'] - $stud['mouli'];
            echo $stud['name'].":".$moyenne."\n";
        }
    }
}
?>