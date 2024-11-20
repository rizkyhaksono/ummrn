<!-- User Profile -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h2 class="mt-5">My Profile</h2>
      <hr />
    </div>

    <?php
    include_once "koneksi.php";
    $userId = $_SESSION['userid'];
    $sql = "SELECT DISTINCT * ,
              projects.title AS project_title,
              joinresearch.status AS research_status,
              students.name AS student_name
        FROM joinresearch
        JOIN students ON joinresearch.id_student = students.id_student
        JOIN projects ON joinresearch.id_project = projects.id_project
        JOIN researchers ON projects.id_researcher = researchers.id_researcher
        WHERE students.id_student = $userId";

    $query = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        echo "<div class='card mb-4 shadow-sm w-100'>";
        echo "<div class='card-body'>";
        echo "<ul class='list-group list-group-flush'>";

        echo "<li class='list-group-item'><strong>NIM:</strong> {$row['nim']}</li>";
        echo "<li class='list-group-item'><strong>Name:</strong> {$row['student_name']}</li>";
        echo "<li class='list-group-item'><strong>Researcher Name:</strong> {$row['name']}</li>";
        echo "<li class='list-group-item'><strong>Project Title:</strong> {$row['project_title']}</li>";
        echo "<li class='list-group-item'><strong>Project Description:</strong> {$row['description']}</li>";
        echo "<li class='list-group-item'><strong>Project Year:</strong> {$row['published_year']}</li>";
        echo "<li class='list-group-item'><strong>Motivation:</strong> {$row['motivation']}</li>";
        echo "<li class='list-group-item'><strong>Status:</strong> <span class='text-primary'>{$row['status']}</span></li>";
        echo "<li class='list-group-item'><strong>Research Status:</strong> <span class='text-primary'>{$row['research_status']}</span></li>";
        echo "<li class='list-group-item'><strong>Interest:</strong> {$row['interest']}</li>";

        echo "</ul>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<div class='col-12'><p class='text-muted'>No data found for the user.</p></div>";
    }
    ?>
  </div>
</div>