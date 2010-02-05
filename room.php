<?php
/*
 *      room.php
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


$PAGE_TITLE='Zimmerverwaltung';
$PAGE_HEADLINE='Zimmer hinzufügen und entfernen';

include('include/header.inc');

// intro paragraph
echo "<p>".t("Auf dieser Seite können Sie die Zimmer verwalten.")."</p>";

unset($msg); // delete any old messages from past actions

if ($_SESSION['rights'] != "admin")
    {
        echo "<strong>".t("Sie haben keine Administratorrechte und können keine Zmmer verwalten!")."</strong>";
    }
else
{
	if ($_GET['room'] > 0)
	{
		$bookings_roomcount = good_query_table('SELECT COUNT(room) as roomcount FROM bookings WHERE room="'.$_GET['room'].'"');
		
		if ($bookings_roomcount[0]['roomcount'] > 0)
		{
			$msg = t("Zimmer konnte nicht entfernt werden. Es existieren noch Buchungen.");
		}
		else
		{
			good_query('DELETE FROM rooms WHERE id="'.$_GET['room'].'"');
			
			$msg = t("Zimmer erfolgreich entfernt.");
		}// else
			
		?>
        <br />
        <form action="room.php">
        
        <?php echo $msg;?>
        
        </form>
        <br />
        
		<?php
		$_POST['insert'] = 0;
	}// if
	
	
	if ($_POST['insert'] == 1)
	{
		good_query('INSERT INTO rooms (name,capacity) VALUES ("'.$_GET['name'].'", "'.$_GET['capacity'].'")',2);
				
		?>
		
        <br />
		<form action="room.php">
		
		<?php echo t("Zimmer erfolgreich hinzugefügt.");?>
		
		</form>
        <br />
		
		<?php
		
		$_POST['insert'] = 0;
	}// if
		
	echo "<h3>".t("Verfügbare Zimmer")."</h3>";
	
	$rooms_rooms = good_query_table('SELECT id as roomid, name, capacity FROM rooms ORDER BY name ASC');
	
	echo '<form><table>';
	echo '<tr><th>'.t("Name").'</th>
			  <th>'.t("Personen").'</th>
			  <th>'.t("").'</th></tr>';
			
	foreach ($rooms_rooms as $rooms)
	{
		echo '<td>'.$rooms['name'].'</td>';
		echo '<td>'.$rooms['capacity'].'</td>';
		
		echo '<td><a href="'.url_add_parameter($_SERVER['ORIG_PATH_INFO'].'?show=0',"room",$rooms['roomid']).'">'.t("Entfernen").'</a></td></tr>';
	}// foreach
			
	echo '</table>';	
	echo '</form>';

	echo "<br /><h3>".t("Zimmer hinzufügen")."</h3>";	
	
	?>
		
	<form action="room.php" method="post">
	
	<table>
		<th><table border="0">
		<tr><th><?php echo t("Name");?>:</th>
		<td><input type="text" name="name"></td>
	
		<th><?php echo t("Personen");?>:</th>
		<td><input type="text" name="capacity"></td></tr>
		</table></th>
	</table>
	
	<input type="hidden" name="insert" value="1">
	
	<input type="submit" value="<?php echo t("Hinzufügen");?>">
	<input type="reset" value="<?php echo t("Reset");?>">
	
	</form>
		
	<?php
}// else

include('include/footer.inc');
?>
