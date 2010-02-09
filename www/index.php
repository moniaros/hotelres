<?php
/*
 *      index.php
 *      
 *      Copyright 2010 Daniel Böhmer <daniel.boehmer@it2007.ba-leipzig.de> and
 *                     Patrick Nicolaus <patrick.nicolaus@it2007.ba-leipzig.de>
 *      
 *      This file is part of Hotelres.
 * 
 *      Hotelres is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      Hotelres is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */


$PAGE_TITLE='Hauptseite';
$PAGE_HEADLINE='Willkommen bei Hotelsres';

include('include/header.inc');

echo "<p>".t("Willkommen bei Hotelres, dem Reservierungssystem für Ihr Hotel oder Ihre Herberge!")."</p>";

echo "<p>".t("Mit diesem System können Reservierungen erstellt, angesehen und verändert werden.")."</p>";

?>
<h3><?php echo t("Typische Aufgaben");?></h3>
<ul>
	<li><a href="schedule.php"><?php echo t("Überprüfen Sie bestehende Buchungen im Belegungsplan");?></a></li>
	<li><a href="booking.php"><?php echo t("Einen neuen Gast einbuchen");?></a></li>
</ul>

<?php

include('include/footer.inc');
?>