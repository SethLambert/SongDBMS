<?php 
include('assets/header.html');
include('assets/menu.html');
// Create database connection
include("pdo_connect.php");

// include user-defined methods
include('model.php');

$action = '';
if (isset($_GET['type']))
        // Read user input
    $action = $_GET['type'];
switch ($action){


        case 'top100Songs':
                // Define SQL statement
                $sql = "CALL top100Songs2()";

                // Obtain a list of customers
                $data = getAllRecords($sql);

                // Use a template to display the output
                include('views/tableview.php');
                break;
        case 'top100Artists':
                // Define SQL statement
                $sql = "CALL top100Artists()";

                // Obtain a list of customers
                $data = getAllRecords($sql);

                // Use a template to display the output
                include('views/tableview.php');
                break;
        case 'allSongs':
                // Define SQL statement
                $sql = "CALL allSongs()";

                // Obtain a list of customers
                $data = getAllRecords($sql);

                // Use a template to display the output
                include('views/tableview.php');
                break;
        case 'allArtists':
                // Define SQL statement
                $sql = "CALL allArtists()";

                // Obtain a list of customers
                $data = getAllRecords($sql);

                // Use a template to display the output
                include('views/tableview.php');
                break;
        case 'allReleases':
                // Define SQL statement
                $sql = "CALL allReleases()";

                // Obtain a list of customers
                $data = getAllRecords($sql);

                // Use a template to display the output
                include('views/tableview.php');
                break;
        case 'allGenres':
                // Define SQL statement
                $sql = "CALL allGenres()";
		
                // Obtain a list of customers
                $data = getAllRecords($sql);

                // Use a template to display the output
                include('views/tableview.php');
                break;
	case 'addSong':
		//include template
		include ('views/newsongform.html');
		break;
	case 'getSong':
		$input = '';
		if(isset($_POST['find'])){
			$input = $_POST['find'];
		}
		$select = '';
                if(isset($_POST['select'])){
                        $select = $_POST['select'];
                }
                // Define SQL statement
                $sql = "CALL ".$select."(:input)";
		$parameter_values = array(':input' => $input);
		
		//echo $sql."<br>";
		//echo $input."<br>";
                // Obtain a list of customers
                $data = getAllRecords($sql, $parameter_values);

                // Use a template to display the output
                include('views/tableview.php');
		break;

	case 'editEntry':
		$input = '';
		if(isset($_POST['id'])){
			$input = $_POST['id'];
		}
		$sql = "CALL selectSong(:input)";
                $parameter_values = array(':input' => $input);
		$data = getOneRecord($sql, $parameter_values);
		include('views/editsongform.php');
		break;

	case 'updateInfo':
		$song_id = '';
                if(isset($_POST['song_id'])){
                        $song_id = $_POST['song_id'];
                }
		$song_title = '';
                if(isset($_POST['song_title'])){
                        $song_title = $_POST['song_title'];
                }
                $terms = '';
                if(isset($_POST['terms'])){
                        $terms = $_POST['terms'];
                }
                $tempo = '';
                if(isset($_POST['tempo'])){
                        $tempo = $_POST['tempo'];
                }
                $popularity = '';
                if(isset($_POST['popularity'])){
                        $popularity = $_POST['popularity'];
                }
                $year = '';
                if(isset($_POST['year'])){
                        $year = $_POST['year'];
                }
		$sql = "CALL updateSong(:song_id, :song_title, :terms, :tempo, :popularity, :year)";
		$parameter_values = array(':song_id' => $song_id,
					  ':song_title' => $song_title,
					  ':terms' => $terms,
					  ':tempo' => $tempo,
					  ':popularity' => $popularity,
					  ':year' => $year);
                $data = getOneRecord($sql, $parameter_values);
		echo "Updated:<br>Song ID: ".$song_id."<br>Song title: ".$song_title."<br>Terms: ".$terms."<br>Tempo: ".
			$tempo."<br>Popularity: ".$popularity."<br>Year: ".$year;
		break;
	case 'addRecord':
		$title = '';
                if(isset($_POST['title'])){
                        $title = $_POST['title'];
                }
		$artist = '';
                if(isset($_POST['artist'])){
                        $artist = $_POST['artist'];
                }
		$release = '';
                if(isset($_POST['release'])){
                        $release = $_POST['release'];
                }
		$year = '';
                if(isset($_POST['year'])){
                        $year = $_POST['year'];
                }
		$terms = '';
                if(isset($_POST['terms'])){
                        $terms = $_POST['terms'];
                }
		$tempo = '';
                if(isset($_POST['tempo'])){
                        $tempo = $_POST['tempo'];
                }
		$duration = '';
                if(isset($_POST['duration'])){
                        $duration = $_POST['duration'];
                }
		$loudness = '';
                if(isset($_POST['loudness'])){
                        $loudness = $_POST['loudness'];
                }
		$mode = '';
                if(isset($_POST['mode'])){
                        $mode = $_POST['mode'];
                }
		$song_pop = '';
                if(isset($_POST['song_pop'])){
                        $song_pop = $_POST['song_pop'];
                }
		$artist_pop = '';
                if(isset($_POST['artist_pop'])){
                        $artist_pop = $_POST['artist_pop'];
                }
		$song_id = '';
                if(isset($_POST['song_id'])){
                        $song_id = $_POST['song_id'];
                }
		$album_id = '';
                if(isset($_POST['album_id'])){
                        $album_id = $_POST['album_id'];
                }
		$artist_id = '';
                if(isset($_POST['artist_id'])){
                        $artist_id = $_POST['artist_id'];
                }
		$sql = "CALL addRecord(:title, :artist, :release, :year, :terms, :tempo, 
					:duration, :loudness, :mode, :song_pop, :artist_pop,
					:song_id, :album_id, :artist_id)";
		$parameter_values = array(':title' => $title, ':artist' => $artist, ':release' => $release,
					  ':year' => $year, ':terms' => $terms, ':tempo' => $tempo,
					  ':duration' => $duration, ':loudness' => $loudness, ':mode' => $mode,
					  ':song_pop' => $song_pop, ':artist_pop' => $artist_pop, ':song_id' => $song_id,
					  ':album_id' => $album_id, ':artist_id' => $artist_id);
		$data = getOneRecord($sql, $parameter_values);
		echo "ADDED RECORD<br>Title: ".$title."<br>Artist: ".$artist."<br>Release: ".$release."<br>Year: ".$year."<br>Terms: ".$terms.
			"<br>Tempo: ".$tempo."<br>Duration: ".$duration."<br>Loudness: ".$loudness."<br>Mode: ".$mode."<br>Song Popularity: ".
			$song_pop."<br>Artist Popularity: ".$artist_pop."<br>Song ID: ".$song_id."<br>Album ID: ".$album_id.
			"<br>Artist ID: ".$artist_id;
		break;

        default:
                // Default output
		include('views/defaultview.html');
                break;
}
 include('assets/footer.html');
?>
