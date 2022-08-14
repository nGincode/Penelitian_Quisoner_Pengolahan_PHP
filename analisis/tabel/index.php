<?php
$fileisi = file_get_contents("../../data/json/isi.json");
$isi = json_decode($fileisi, TRUE);

$filesoal = file_get_contents("../../data/json/soal.json");
$soal = json_decode($filesoal, TRUE);

$count = [];
foreach ($soal as $v) {
    if (isset($v['id'])) {
        $count[] = $v['id'];
    }
}

echo '
<html>
<body>
<table id="customers">
<tr>
<th>NO</th>';

foreach ($count as $c) {
    if ($c > 9 && $c < 51) {
        echo '<th>P ' . $c . '</th>';
    }
}
echo '
<th>Status</th>
</tr>
';

$no = 1;
foreach ($isi as $key => $value) {
    echo '<tr><td><b>' . $no++ . '</b></td>';

    foreach ($count as $a) {
        if ($a > 9 && $a < 51) {
            foreach ($value['jawaban'] as $jwb) {
                if (isset($jwb['pertanyaan_' . $a])) {
                    echo '<td>' . $jwb['pertanyaan_' . $a] . '</td>';
                }
            }
        }
    }

    if ($value['status'] == 1) {
        echo '<td>true</td>';
    } else {
        echo '<td>false</td>';
    }

    echo '</tr>';
}

echo '</table>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</body>
</html>
';
