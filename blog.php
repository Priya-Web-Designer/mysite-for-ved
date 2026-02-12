<?php
// API URL
$api_url = 'https://vedantaiasacademy.org/api/blogs.php';

// API se data lena
$response = file_get_contents($api_url);

// Agar API call successful ho
if ($response !== false) {
  // JSON to PHP array
  $blogs = json_decode($response, true);

  // Check if data aaya hai
  if (!empty($blogs)) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Vedanta IAS Academy | Best for UPSC Preparation</title>
      <meta name="description"
        content="Vedanta IAS Academy is the best IAS coaching institute in Delhi for UPSC preparation. Join us for expert guidance and comprehensive study material.">
      <meta name="keywords"
        content="Vedanta IAS Academy, IAS Coaching Delhi, Best UPSC Coaching, UPSC Classes Delhi, Civil Services Coaching, IAS Preparation Institute, Top UPSC Institute India">

      <link rel="canonical" href="https://www.vedantaiasacademy.com/blog.php" />

      <?php
      include 'include/header.php';
      ?>

      <!-- Blog Page Heading Section Start -->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-10">
              <h1 class="display-5 fw-bold text-primary mb-3">Explore Our Latest Blog Articles</h1>
              <p class="lead text-muted">
                Get valuable insights, preparation tips, and updates from Vedanta IAS Academy to boost your UPSC journey.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- Blog Page Heading Section End -->


      <section>
        <div class="container py-5">
          <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <!-- Slide 1 -->
              <div class="carousel-item active">
                <div class="row justify-content-center">
                  <?php for ($i = 0; $i < 3 && $i < count($blogs); $i++) {
                    $blog = $blogs[$i]; ?>
                    <div class="col-md-4">
                      <div class="card text-center">
                        <img src="<?php echo htmlspecialchars($blog['image']) ?>" class="card-img-top w-100" alt="Blog Image"
                          style=" height: 186px; ">
                        <div class="card-body">
                          <a href="#"
                            class="btn btn-sm btn-outline-primary mb-2"><?php echo htmlspecialchars($blog['blog_cat_name']) ?></a>
                          <h5 class="card-title"><a
                              href="blog-detail.php?slug=<?php echo $blog['slug']; ?>"><?php echo htmlspecialchars($blog['blog_title']) ?></a>
                          </h5>
                          <p class="card-text"><small
                              class="text-muted"><?php echo htmlspecialchars($blog['created_at']) ?></small></p>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>

              <!-- Slide 2 -->
              <div class="carousel-item">
                <div class="row justify-content-center">
                  <?php for ($i = 3; $i < 6 && $i < count($blogs); $i++) {
                    $blog = $blogs[$i]; ?>
                    <div class="col-md-4 h-100">
                      <div class="card text-center">
                        <img src="<?php echo htmlspecialchars($blog['image']) ?>" class="card-img-top w-100" alt="Blog Image"
                          style=" height: 186px; ">
                        <div class="card-body">
                          <a href="#"
                            class="btn btn-sm btn-outline-primary mb-2"><?php echo htmlspecialchars($blog['blog_cat_name']) ?></a>
                          <h5 class="card-title"><a
                              href="blog-detail.php?slug=<?php echo $blog['slug']; ?>"><?php echo htmlspecialchars($blog['blog_title']) ?></a>
                          </h5>
                          <p class="card-text"><small
                              class="text-muted"><?php echo htmlspecialchars($blog['created_at']) ?></small></p>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-info"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-info"></span>
            </button>
          </div>
        </div>
      </section>

      <section class="blog-post-area mt-4 mb-5">
        <div class="container">
          <div class="row">
            <!-- Main Blog Content -->
            <div class="col-lg-8 col-md-7 col-12">
              <?php foreach ($blogs as $blog) { ?>
                <div class="card mb-4">
                  <img src="<?php echo htmlspecialchars($blog['image']) ?>" class="card-img-top" alt="Blog Image">
                  <div class="card-body">
                    <ul class="list-inline small text-muted mb-2">
                      <li class="list-inline-item"><i class="ti-user"></i>
                        <?php echo htmlspecialchars($blog['blog_cat_name']) ?></li>
                      <li class="list-inline-item"><i class="ti-notepad"></i>
                        <?php echo htmlspecialchars($blog['readable_date']) ?></li>
                      <li class="list-inline-item">
                        <i class="ti-themify-favicon"></i>
                        <?php
                        $comments = []; // Default to empty array
                  
                        $commentAPI = "https://vedantaiasacademy.org/api/comments.php?slug=" . urlencode($blog['slug']);
                        $ch = curl_init($commentAPI);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);

                        // Decode API response
                        $decoded = json_decode($response, true);

                        // Validate decoded data to avoid false positives like ["No record found"]
                        if (is_array($decoded) && isset($decoded[0]['comments'])) {
                          $comments = $decoded;
                        }

                        echo count($comments);
                        ?> Comment
                      </li>

                    </ul>
                    <h5 class="card-title">
                      <?php echo htmlspecialchars($blog['blog_title']) ?>
                    </h5>
                    <p class="mb-1 hidden"><?php echo htmlspecialchars($blog['meta_keywords']) ?></p>

                    <?php
                    $fullDescription = strip_tags(html_entity_decode($blog['blog_description']));
                    $shortDescription = substr($fullDescription, 0, 200);
                    $shortDescription .= (strlen($fullDescription) > 200) ? '...' : '';
                    ?>
                    <p class="card-text"><?php echo nl2br($shortDescription); ?></p>


                    <!-- Blog detail link with IDs -->
                    <a href="blog-detail.php?slug=<?php echo $blog['slug']; ?>" class="btn btn-primary btn-sm pe-3">
                      Read More <i class="fa fa-angle-right right-move1"></i>
                      <i class="fa fa-angle-right right-move2"></i>
                    </a>
                  </div>
                </div>
              <?php } ?>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 col-12">
              <div class="mb-4 p-4 bg-light rounded shadow-sm">
                <h5>Newsletter</h5>
                <form onsubmit="submitForm(event)">
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" required><br>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                </form>
              </div>

            

              <div>
                <h5 class="bg-primary text-white py-3 px-4 m-0">Letest Posts</h5>

                <div class="mb-4 p-4 bg-light rounded shadow-sm">
                  <?php
                  // API URL
                  $api_url = 'https://vedantaiasacademy.org/api/otherblog.php?type=latest';

                  // API se data lena
                  $response_cat = file_get_contents($api_url);

                  // Agar API call successful ho
                  if ($response !== false) {
                    // JSON to PHP array
                    $categary = json_decode($response_cat, true);

                    // Check if data aaya hai
                    if (!empty($categary)) {
                      foreach ($categary as $cat) {
                        ?>
                        <div class="d-flex mb-3">
                          <img src="<?php echo htmlspecialchars($cat['image']) ?>" class="me-3 rounded" width="80" alt="Thumb">
                          <div>
                            <h6 class="mb-1"><a
                                href="blog-detail.php?slug=<?php echo $cat['slug']; ?>"><?php echo htmlspecialchars($cat['blog_title']) ?></a>
                            </h6>
                            <small class="text-muted"><?php echo htmlspecialchars($cat['blog_cat_name']) ?> |
                              <?php echo htmlspecialchars($cat['readable_date']) ?></small>
                          </div>
                        </div>
                        <hr>
                        <?php
                      }

                    } else {
                      echo "No blog data found.";
                    }
                  } else {
                    echo "API se data fetch nahi ho paya.";
                  }
                  ?>
                </div>
              </div>

              <!-- <div class="p-4 bg-light rounded shadow-sm">
                <h5>Tags</h5>
                <div class="d-flex flex-wrap gap-2 mt-2">
                  <a href="#" class="badge bg-secondary">project</a>
                  <a href="#" class="badge bg-secondary">love</a>
                  <a href="#" class="badge bg-secondary">technology</a>
                  <a href="#" class="badge bg-secondary">travel</a>
                  <a href="#" class="badge bg-secondary">software</a>
                  <a href="#" class="badge bg-secondary">life style</a>
                  <a href="#" class="badge bg-secondary">design</a>
                  <a href="#" class="badge bg-secondary">illustration</a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </section>

      
      <script>
        function submitForm(event) {
          event.preventDefault();
          const name = document.querySelector('input[name="name"]').value;
          const email = document.querySelector('input[name="email"]').value;
          if (!name || !email) {
            alert('Please fill in both fields.');
            return;
          }
          const data = { name: name, email: email };
          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            return;
          }

          fetch('https://vedantaiasacademy.org/api/newsletter.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
          })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'success') {
                alert('Your email has been submitted successfully!');
              } else {
                alert('Error: ' + data.message);
              }
            })
            .catch(error => {
              console.error('Fetch error:', error);
              alert('Error: ' + error);
            });
        }
      </script>


      <?php
      include 'include/footer.php';
      ?>


      </body>

    </html>

    <?php

  } else {
    echo "No blog data found.";
  }
} else {
  echo "API se data fetch nahi ho paya.";
}
?>