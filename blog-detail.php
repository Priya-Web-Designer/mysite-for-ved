<?php
$slug = $_GET['slug'] ?? '';

// API call
$apiURL = "https://vedantaiasacademy.org/api/blogs.php";
$ch = curl_init($apiURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$blogs = json_decode($response, true);
$selectedBlog = null;

if ($blogs && is_array($blogs)) {
    foreach ($blogs as $blog) {
        if ($blog['slug'] == $slug) {
            $selectedBlog = $blog;
            break;
        }
    }
}


$comments = []; // Default to empty array

$commentAPI = "https://vedantaiasacademy.org/api/comments.php?slug=" . urlencode($slug);
$ch = curl_init($commentAPI);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode API response
$decoded = json_decode($response, true);

// Final reliable check: Must be an array of items with keys
if (is_array($decoded) && isset($decoded[0]['comments'])) {
    $comments = $decoded;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $selectedBlog['blog_title'] ?? 'Blog Not Found'; ?></title>
    <meta name="description"
        content="Vedanta IAS Academy is the best IAS coaching institute in Delhi for UPSC preparation. Join us for expert guidance and comprehensive study material.">
    <meta name="keywords" content="<?= $selectedBlog['meta_keywords'] ?? 'UPSC'; ?>">
    <link rel="canonical" href="https://www.vedantaiasacademy.com/blog-details.php" />

    <?php include 'include/header.php'; ?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main Blog Content -->
                <div class="col-lg-8 mb-4">
                    <div class="container py-5">
                        <?php if ($selectedBlog): ?>
                            <div class="card border-0 shadow-sm">

                                <img src="<?= $selectedBlog['image']; ?>" class="card-img-top img-fluid" alt="">

                                <div class="card-body">
                                    <h4 class="card-title"><?= $selectedBlog['blog_title']; ?></h4>

                                    <div class="d-flex justify-content-between text-muted small mb-3">

                                        <div>
                                            <span class="me-2"><?= $selectedBlog['blog_cat_name']; ?></span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="me-2 text-end">
                                                <div class="fw-bold">Vedanta IAS Academy</div>
                                                <div>
                                                    <?= date('d M, Y h:i A', strtotime($selectedBlog['created_at'] ?? '')); ?>
                                                </div>
                                            </div>
                                            <img src="img/logo.png" width="42" height="42" class="rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <?= html_entity_decode($selectedBlog['blog_description']); ?>
                                    </div>
                                    <div class="d-flex flex-column flex-md-row justify-content-between mt-4">
                                        <a href="#" class="text-decoration-none"><i class="bi bi-heart me-2"></i>Liked by 4
                                            users</a>
                                        <a href="#" class="text-decoration-none"><i
                                                class="bi bi-chat-left-dots me-2"></i><?= count($comments) ?> Comments</a>
                                        <div>
                                            <a href="https://www.facebook.com/IASpreparationindelhi" class="me-2"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/VEDANTA_IAS" class="me-2"><i
                                                    class="fab fa-twitter"></i></a>
                                            <a href="https://www.instagram.com/vedantaias97" class="me-2"><i
                                                    class="fab fa-instagram-square"></i></a>
                                            <a href="https://www.youtube.com/channel/UC3EwUZp_-yKORsaM47lppJQ"><i
                                                    class="fab fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger">Blog not found. Invalid ID or category.</div>
                        <?php endif; ?>
                    </div>

                    <!-- Comments Section -->
                    <?php
                    // Function to get profile image from Gravatar
                    function getProfileImage($email)
                    {
                        // Trim and lowercase the email
                        $email = strtolower(trim($email));

                        // Generate Gravatar URL
                        $hash = md5($email);
                        $gravatarURL = "https://www.gravatar.com/avatar/$hash?s=60&d=404";

                        // Check if gravatar image exists
                        $headers = @get_headers($gravatarURL);
                        if ($headers && strpos($headers[0], '200')) {
                            return $gravatarURL;
                        } else {
                            return "img/icons/students.PNG"; // fallback image
                        }
                    }
                    ?>

                    <!-- Comment Section HTML -->
                    <div class="mt-4">
                        <h4><?= count($comments) ?> Comments</h4>
                        <?php if (empty($comments)): ?>
                            <p class="text-muted">No comments yet. Be the first to comment!</p>
                        <?php endif; ?>

                        <?php foreach ($comments as $comment): ?>
                            <div class="d-flex mt-3">

                                <img src="<?php echo getProfileImage($comment['useremail']); ?>" class="rounded-circle me-3"
                                    width="80" alt="User">
                                <div>
                                    <h6 class="mb-0"><?php echo htmlspecialchars($comment['name']); ?></h6>

                                    <small
                                        class="text-muted"><?php echo date("F j, Y \\a\\t g:i a", strtotime($comment['created_at'])); ?></small>

                                    <p class="mb-1"><?php echo nl2br(htmlspecialchars($comment['comments'])); ?></p>
                                    <a href="#" class="btn btn-sm btn-outline-secondary">Reply</a>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Comment Form -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Form data ko secure aur trim karo
                        $name = trim($_POST['name']);
                        $email = trim($_POST['email']);
                        $message = trim($_POST['message']);

                        // Set slug manually or dynamically
                        $slug = basename($_SERVER['REQUEST_URI']); // or use your logic
                    
                        // API URL
                        $api_url = "https://vedantaiasacademy.org/api/add_comments.php";

                        // POST data array
                        $postData = [
                            'name' => $name,
                            'email' => $email,
                            'comments' => $message,
                            'url' => $slug
                        ];

                        // cURL request
                        $ch = curl_init($api_url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

                        $response = curl_exec($ch);
                        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);

                        // Show confirmation
                        if ($httpcode == 200) {
                            echo "<script>alert('Comment submitted successfully!');</script>";
                        } else {
                            echo "<script>alert('Failed to submit comment.');</script>";
                            echo "<pre>$response</pre>"; // Debugging response
                        }
                    }
                    ?>

                    <div class="container mt-5">
                        <h4>Reply to this Post</h4>
                        <form onsubmit="submitCommentsForm(event)">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                        required>
                                    <input type="hidden" name="hidden" value="<?= $slug ?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Enter email address"
                                        name="email" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Message" name="message"
                                        required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="mb-4 p-4 bg-light rounded shadow-sm">
                        <h5>Newsletter</h5>
                        <form onsubmit="submitForm(event)">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                    required><br>
                                <input type="email" class="form-control" placeholder="Enter email" name="email"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                        </form>
                    </div>

                    <!-- categary -->

                    <!-- <div class="mb-4 p-4 bg-light rounded shadow-sm">
                        <h5>Category</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Technology</span><span>(03)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Software</span><span>(09)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Lifestyle</span><span>(12)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shopping</span><span>(02)</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Food</span><span>(10)</span>
                            </li>
                        </ul>
                    </div> -->

                    <!-- LETEST  -->

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
                                            <img src="<?php echo htmlspecialchars($cat['image']) ?>" class="me-3 rounded" width="80"
                                                alt="Thumb">
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
                <!-- End Sidebar -->

            </div>
        </div>
    </section>


    <?php include 'include/footer.php'; ?>


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

        function submitCommentsForm(event) {
            event.preventDefault();
            const name = document.querySelector('input[name="name"]').value;
            const url = document.querySelector('input[name="hidden"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const message = document.querySelector('textarea[name="message"]').value;
            if (!name || !email || !message) {
                alert('Please fill in all fields.');
                return;
            }
            console.log(name, email, message, url);
            // Validate message length
            if (message.length < 2) {
                alert('Message must be at least 10 characters long.');
                return;
            }
            const data = { name: name, email: email, comments: message, url: url };
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            fetch('https://vedantaiasacademy.org/api/add_comments.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Clear the form fields
                        document.querySelector('input[name="name"]').value = '';
                        document.querySelector('input[name="email"]').value = '';
                        document.querySelector('textarea[name="message"]').value = '';
                        
                        alert('Your Comments has been submitted successfully!');

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

    </body>

</html>