<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery – Seminars, Events at Vedanta IAS Academy</title>
    <meta name="description"
        content="View images of our classrooms, Toppers Award ceremony, seminars, student activities, and events at Vedanta IAS. A glimpse into our inspiring environment.">
    <meta name="keywords"
        content="Vedanta IAS Gallery, UPSC Coaching Photos, Classroom Images, IAS Event Photos, Civil Services Seminar Pictures, Institute Photos Delhi">

    <link rel="canonical" href="https://www.vedantaiasacademy.com/gallery.php" />

    <?php
    include 'include/header.php';
    ?>

    <style>

        
        @layers general,
        demo;

        @layer demo {
            .grid {
                max-width: 1200px;
                display: grid;
                gap: 0.5rem;
                grid-template-columns: repeat(5, 1fr);
                grid-auto-rows: 120px;

                @media (min-width: 700px) {
                    grid-auto-rows: 200px;
                }
            }

            .item>img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .item[data-active="true"] {
                grid-column: 1 / 3;
                grid-row: 1 / 3;
                z-index: 2;
            }
        }
        /* Variables */
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #2c3e50;
            --background-color: #f5f6fa;
            --text-color: #2c3e50;
            --border-color: #e1e1e1;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 2rem;
            --border-radius: 8px;
        }

        /* Gallery Controls */
        .gallery-controls {
            display: flex;
            flex-wrap: wrap;
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-lg);
            align-items: center;
            justify-content: space-between;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .search-box input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.5rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .category-filters {
            display: flex;
            gap: var(--spacing-sm);
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: var(--border-radius);
            background: white;
            color: var(--text-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: white;
        }

        .sort-options select {
            padding: 0.5rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            background: white;
            cursor: pointer;
        }

        /* Gallery Grid */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
        }

        .gallery-item {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 10px var(--shadow-color);
            transition: var(--transition);
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px var(--shadow-color);
        }

        .gallery-item-inner {
            position: relative;
            padding-top: 75%;
            overflow: hidden;
        }

        .gallery-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }

        .gallery-item-overlay i {
            color: white;
            font-size: 2rem;
        }

        .gallery-item-info {
            padding: var(--spacing-md);
        }

        .gallery-item-info h3 {
            margin-bottom: var(--spacing-sm);
            font-size: 1.1rem;
        }

        .category {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            background: var(--primary-color);
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1021;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90vh;
        }

        .lightbox-content img {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
            transition: var(--transition);
        }

        .lightbox-caption {
            position: absolute;
            bottom: -2rem;
            left: 0;
            width: 100%;
            text-align: center;
            color: white;
            padding: var(--spacing-sm);
        }

        .lightbox-info {
            position: absolute;
            bottom: -4rem;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: var(--spacing-md);
            color: white;
            font-size: 0.9rem;
        }

        .lightbox button {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
        }

        .lightbox button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .lightbox-close {
            top: 20px;
            right: 20px;
        }

        .lightbox-prev {
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .lightbox-next {
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .lightbox-zoom-in,
        .lightbox-zoom-out,
        .lightbox-rotate,
        .lightbox-fullscreen,
        .lightbox-download {
            bottom: 20px;
        }

        .lightbox-zoom-in {
            right: 180px;
        }

        .lightbox-zoom-out {
            right: 140px;
        }

        .lightbox-rotate {
            right: 100px;
        }

        .lightbox-fullscreen {
            right: 60px;
        }

        .lightbox-download {
            right: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .gallery-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                width: 100%;
            }

            .category-filters {
                justify-content: center;
            }

            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }

            .lightbox-zoom-in,
            .lightbox-zoom-out,
            .lightbox-rotate,
            .lightbox-fullscreen,
            .lightbox-download {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: var(--spacing-md);
            }

            header h1 {
                font-size: 2rem;
            }

            .gallery {
                grid-template-columns: 1fr;
            }

            .lightbox-prev,
            .lightbox-next {
                display: none;
            }
        }
    </style>


    <div class="container">
        <div class="text-center py-5">
            <h1 class="text-primary text-capitalize">Image Gallery</h1>
            <p>Click on any image to view in lightbox mode</p>
        </div>
    </div>

    
    <div class="container">
        <div class="grid">
            <div class="item" data-active="true">
                <img src="https://picsum.photos/id/53/300/300" alt="">
            </div>
            <div class="item">
                <img src="https://picsum.photos/id/124/300/300" alt="">
            </div>
            <div class="item">
                <img src="https://picsum.photos/id/244/300/300" alt="">
            </div>
            <div class="item">
                <img src="https://picsum.photos/id/186/300/300" alt="">
            </div>
            <div class="item">
                <img src="https://picsum.photos/id/256/300/300" alt="">
            </div>
            <div class="item">
                <img src="https://picsum.photos/id/77/300/300" alt="">
            </div>
            <div class="item">
                <img src="https://picsum.photos/id/221/300/300" alt="">
            </div>
        </div>
    </div>


    <div class="container">
        <div class="gallery-controls">
            <div class="search-box">
                <input type="text" id="search" placeholder="Search images...">
                <i class="fas fa-search"></i>
            </div>

            <div class="category-filters">
                <button class="filter-btn active" data-category="all">All</button>
                <button class="filter-btn" data-category="topper">Toppers</button>
                <button class="filter-btn" data-category="event">Events</button>
                <button class="filter-btn" data-category="seminar">Seminar</button>
                <button class="filter-btn" data-category="class-room">Class Room</button>
            </div>

            <div class="sort-options">
                <select id="sort">
                    <option value="default">Sort by</option>
                    <option value="name">Name</option>
                    <option value="category">Category</option>
                </select>
            </div>
        </div>

        <div class="gallery">
            <div class="gallery-item" data-category="seminar">
                <div class="gallery-item-inner">
                    <img src="img/images/seminar1.jpg" alt="Seminar on UPSC Preparation" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Seminar</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper1.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event1.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Event</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper2.jpeg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="seminar">
                <div class="gallery-item-inner">
                    <img src="img/images/seminar2.jpg" alt="Seminar on UPSC Preparation" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>seminar</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class1.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event2.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper20.jpeg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class2.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper3.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event3.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper14.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class3.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper15.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event4.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class4.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper4.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event5.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class5.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper16.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event6.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper5.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event7.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper19.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class6.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room"</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper6.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event8.jpeg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class7.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room"</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper17.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event9.jpeg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper7.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event10.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="class-room">
                <div class="gallery-item-inner">
                    <img src="img/images/class8.jpg" alt="Class Room" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Class Room"</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper13.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="seminar">
                <div class="gallery-item-inner">
                    <img src="img/images/seminar3.jpg" alt="Waterfall" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Seminar</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event11.jpeg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper8.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event12.jpeg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper9.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="seminar">
                <div class="gallery-item-inner">
                    <img src="img/images/seminar4.jpg" alt="Seminar" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Seminar</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper18.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="event">
                <div class="gallery-item-inner">
                    <img src="img/images/event13.jpg" alt="Event" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Events</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="seminar">
                <div class="gallery-item-inner">
                    <img src="img/images/seminar5.jpg" alt="seminar" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Seminar</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper10.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper11.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="seminar">
                <div class="gallery-item-inner">
                    <img src="img/images/seminar6.jpg" alt="seminar" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Seminar</h3>
                </div>
            </div>
            <div class="gallery-item" data-category="topper">
                <div class="gallery-item-inner">
                    <img src="img/images/topper12.jpg" alt="Topper Image" loading="lazy">
                    <div class="gallery-item-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="gallery-item-info">
                    <h3>Topper</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox -->
    <div class="lightbox">
        <div class="lightbox-content">
            <img src="" alt="Lightbox Image">
            <div class="lightbox-caption"></div>
        </div>
        <button class="lightbox-close">
            <i class="fas fa-times"></i>
        </button>
        <button class="lightbox-prev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="lightbox-next">
            <i class="fas fa-chevron-right"></i>
        </button>
        <button class="lightbox-zoom-in">
            <i class="fas fa-search-plus"></i>
        </button>
        <button class="lightbox-zoom-out">
            <i class="fas fa-search-minus"></i>
        </button>
        <button class="lightbox-rotate">
            <i class="fas fa-redo"></i>
        </button>
        <button class="lightbox-fullscreen">
            <i class="fas fa-expand"></i>
        </button>
        <button class="lightbox-download">
            <i class="fas fa-download"></i>
        </button>
    </div>


    <?php
    include 'include/footer.php';
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const gallery = document.querySelector('.gallery');
            const lightbox = document.querySelector('.lightbox');
            const lightboxImg = lightbox.querySelector('img');
            const lightboxCaption = lightbox.querySelector('.lightbox-caption');
            const lightboxInfo = lightbox.querySelector('.lightbox-info');
            const closeBtn = lightbox.querySelector('.lightbox-close');
            const prevBtn = lightbox.querySelector('.lightbox-prev');
            const nextBtn = lightbox.querySelector('.lightbox-next');
            const zoomInBtn = lightbox.querySelector('.lightbox-zoom-in');
            const zoomOutBtn = lightbox.querySelector('.lightbox-zoom-out');
            const rotateBtn = lightbox.querySelector('.lightbox-rotate');
            const fullscreenBtn = lightbox.querySelector('.lightbox-fullscreen');
            const downloadBtn = lightbox.querySelector('.lightbox-download');
            const searchInput = document.getElementById('search');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const sortSelect = document.getElementById('sort');

            let currentImageIndex = 0;
            let images = [];
            let scale = 1;
            let rotation = 0;
            let isDragging = false;
            let startX, startY, translateX = 0,
                translateY = 0;
            let currentFilter = 'all';
            let currentSort = 'default';

            // Initialize gallery
            function initGallery() {
                const galleryItems = document.querySelectorAll('.gallery-item');
                images = Array.from(galleryItems).map(item => ({
                    src: item.querySelector('img').src,
                    alt: item.querySelector('img').alt,
                    title: item.querySelector('h3').textContent,
                    category: item.dataset.category
                }));

                galleryItems.forEach((item, index) => {
                    item.addEventListener('click', () => openLightbox(index));
                });

                // Initialize lazy loading
                const lazyImages = document.querySelectorAll('img[loading="lazy"]');
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.src;
                            observer.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            }

            // Filter and sort functions
            function filterGallery() {
                const searchTerm = searchInput.value.toLowerCase();
                const galleryItems = document.querySelectorAll('.gallery-item');

                galleryItems.forEach(item => {
                    const title = item.querySelector('h3').textContent.toLowerCase();
                    const category = item.dataset.category;
                    const matchesSearch = title.includes(searchTerm);
                    const matchesFilter = currentFilter === 'all' || category === currentFilter;

                    item.style.display = matchesSearch && matchesFilter ? 'block' : 'none';
                });

                sortGallery();
            }

            function sortGallery() {
                const galleryItems = Array.from(document.querySelectorAll('.gallery-item'));
                const gallery = document.querySelector('.gallery');

                galleryItems.sort((a, b) => {
                    if (currentSort === 'name') {
                        return a.querySelector('h3').textContent.localeCompare(b.querySelector('h3')
                            .textContent);
                    } else if (currentSort === 'category') {
                        return a.dataset.category.localeCompare(b.dataset.category);
                    }
                    return 0;
                });

                galleryItems.forEach(item => gallery.appendChild(item));
            }

            // Enhanced lightbox functions
            function openLightbox(index) {
                currentImageIndex = index;
                updateLightboxImage();
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
                resetZoom();
                updateImageInfo();
            }

            function updateImageInfo() {
                const img = new Image();
                img.src = lightboxImg.src;

                img.onload = () => {
                    const size = formatFileSize(getImageSize(img));
                    const resolution = `${img.naturalWidth} x ${img.naturalHeight}`;

                    lightboxInfo.querySelector('.image-size').textContent = `Size: ${size}`;
                    lightboxInfo.querySelector('.image-resolution').textContent = `Resolution: ${resolution}`;
                };
            }

            function getImageSize(img) {
                const canvas = document.createElement('canvas');
                canvas.width = img.naturalWidth;
                canvas.height = img.naturalHeight;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);
                return canvas.toDataURL().length;
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            function rotateImage() {
                rotation = (rotation + 90) % 360;
                lightboxImg.style.transform = `scale(${scale}) rotate(${rotation}deg)`;
            }

            function toggleFullscreen() {
                if (!document.fullscreenElement) {
                    lightbox.requestFullscreen();
                    fullscreenBtn.querySelector('i').classList.replace('fa-expand', 'fa-compress');
                } else {
                    document.exitFullscreen();
                    fullscreenBtn.querySelector('i').classList.replace('fa-compress', 'fa-expand');
                }
            }

            function downloadImage() {
                const link = document.createElement('a');
                link.href = lightboxImg.src;
                link.download = `image-${currentImageIndex + 1}.jpg`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            // Event listeners for new features
            searchInput.addEventListener('input', filterGallery);

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    currentFilter = btn.dataset.category;
                    filterGallery();
                });
            });

            sortSelect.addEventListener('change', () => {
                currentSort = sortSelect.value;
                sortGallery();
            });

            rotateBtn.addEventListener('click', rotateImage);
            fullscreenBtn.addEventListener('click', toggleFullscreen);
            downloadBtn.addEventListener('click', downloadImage);

            // Event listeners
            closeBtn.addEventListener('click', closeLightbox);
            prevBtn.addEventListener('click', prevImage);
            nextBtn.addEventListener('click', nextImage);
            zoomInBtn.addEventListener('click', zoomIn);
            zoomOutBtn.addEventListener('click', zoomOut);

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (!lightbox.classList.contains('active')) return;

                switch (e.key) {
                    case 'Escape':
                        closeLightbox();
                        break;
                    case 'ArrowLeft':
                        prevImage();
                        break;
                    case 'ArrowRight':
                        nextImage();
                        break;
                    case '+':
                        zoomIn();
                        break;
                    case '-':
                        zoomOut();
                        break;
                }
            });

            // Touch and drag events
            lightboxImg.addEventListener('mousedown', handleDragStart);
            lightboxImg.addEventListener('mousemove', handleDragMove);
            lightboxImg.addEventListener('mouseup', handleDragEnd);
            lightboxImg.addEventListener('mouseleave', handleDragEnd);

            lightboxImg.addEventListener('touchstart', handleDragStart);
            lightboxImg.addEventListener('touchmove', handleDragMove);
            lightboxImg.addEventListener('touchend', handleDragEnd);

            // Zoom functions
            function zoomIn() {
                scale = Math.min(scale + 0.25, 3);
                updateZoom();
            }

            function zoomOut() {
                scale = Math.max(scale - 0.25, 1);
                updateZoom();
            }

            function updateZoom() {
                lightboxImg.style.transform = `scale(${scale})`;
            }

            function resetZoom() {
                scale = 1;
                translateX = 0;
                translateY = 0;
                lightboxImg.style.transform = `scale(${scale}) translate(${translateX}px, ${translateY}px)`;
            }

            // Touch and drag functionality
            function handleDragStart(e) {
                if (scale > 1) {
                    isDragging = true;
                    startX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
                    startY = e.type === 'mousedown' ? e.clientY : e.touches[0].clientY;
                }
            }

            function handleDragMove(e) {
                if (!isDragging) return;
                e.preventDefault();

                const currentX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
                const currentY = e.type === 'mousemove' ? e.clientY : e.touches[0].clientY;

                translateX += currentX - startX;
                translateY += currentY - startY;

                startX = currentX;
                startY = currentY;

                lightboxImg.style.transform = `scale(${scale}) translate(${translateX}px, ${translateY}px)`;
            }

            function handleDragEnd() {
                isDragging = false;
            }

            // Navigate to previous image
            function prevImage() {
                currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                updateLightboxImage();
            }

            // Navigate to next image
            function nextImage() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                updateLightboxImage();
            }

            // Update lightbox image
            function updateLightboxImage() {
                const image = images[currentImageIndex];
                lightboxImg.src = image.src;
                lightboxCaption.textContent = image.alt;
                resetZoom();
            }

            // Close lightbox
            function closeLightbox() {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
                resetZoom();
            }

            // Initialize gallery
            initGallery();
        });
    </script>

    
    <script>
        const grid = document.querySelector(".grid");
        const items = Array.from(grid.children);
        let activeItem = grid.querySelector('.item[data-active="true"]');

        // swap current item with new clicked item
        function swapItems(clickedItem) {
            if (clickedItem === activeItem) return;

            // store sibling reference for repositioning
            const activeNext = activeItem.nextElementSibling;

            // re-order DOM nodes: move clicked to active's position, active to clicked's position
            if (clickedItem === activeNext) {
                // if clicked is immediately after active, just swap positions
                grid.insertBefore(clickedItem, activeItem);
            } else {
                grid.insertBefore(activeItem, clickedItem);
                grid.insertBefore(clickedItem, activeNext);
            }

            // update active state
            activeItem.removeAttribute("data-active");
            clickedItem.setAttribute("data-active", "true");
            activeItem = clickedItem;
        }

        function handleClick(event) {
            const clickedItem = event.target.closest(".item");
            if (!clickedItem || clickedItem === activeItem) return;

            if (document.startViewTransition) {
                document.startViewTransition(() => swapItems(clickedItem));
            } else {
                // no transition for browsers that don't support viewTransition
                swapItems(clickedItem);
            }
        }

        items.forEach((item, index) => {
            item.style.viewTransitionName = `item-${index}`;
            item.addEventListener("click", handleClick);
        });
    </script>



    </body>

</html>