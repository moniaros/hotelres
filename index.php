<?php

$PAGE_TITLE='Hauptseite';
$PAGE_HEADLINE='Willkommen bei Hotelsres';

include('include/header.inc');

// Kommentar hinzugefüht

echo "<p>".t("Willkommen bei Hotelres, dem Reservierungssystem für Ihr Hotel oder Ihre Herberge!")."</p>";

echo "<p>".t("Mit diesem System können Reservierungen erstellt, angesehen und verändert werden.")."</p>";

?>
<h3><?php echo t("Typische Aufgaben");?></h3>
<ul>
	<li><a href="schedule.php"><? echo t("Überprüfen Sie bestehende Buchungen im Belegungsplan");?></a></li>
	<li><a href="booking.php"><? echo t("Einen neuen Gast einbuchen");?></a></li>
</ul>

<?php

include('include/footer.inc');
?>
