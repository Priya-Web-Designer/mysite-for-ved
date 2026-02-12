<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallary</title>

    <style>
        .image-gallary-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            transition: all 0.5s ease-in-out;

            &:hover {
                > :not(:hover) {
                    opacity: 0.4;
                }
            }

            .card {
                transition: transform 0.5s ease;
                height: 300px;
                width: 200px;
                border-radius: 10px;
                overflow: hidden;

                &:hover {
                    cursor: zoom-in;
                    transform: scale(1.1);
                }

                img {
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
            }
        }

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
    </style>


    <?php
    include 'include/header.php';
    ?>

    <div class="image-gallary-section d-md-flex d-none">
        <div class="card">
            <img src="https://media.viasacademy.com/image_upload_facebook/16.webp"
                alt="Man with a beard smiling confidently against a plain background" />
        </div>
        <div class="card">
            <img src="https://media.viasacademy.com/image_upload_facebook/16.webp"
                alt="Young man with curly hair and beard in a thoughtful pose" />
        </div>
        <div class="card">
            <img src="https://media.viasacademy.com/image_upload_facebook/16.webp"
                alt="Serious man in black jacket looking at the camera" />
        </div>
        <div class="card">
            <img src="https://media.viasacademy.com/image_upload_facebook/16.webp"
                alt="Man with short hair and hoodie smiling gently" />
        </div>
        <div class="card">
            <img src="https://media.viasacademy.com/image_upload_facebook/16.webp"
                alt="Confident man with tousled hair wearing a leather jacket" />
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
        <div class="row">
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card py-2 px-2 mx-3 my-3">
                    <img src="https://media.viasacademy.com/image_upload_facebook/16.webp" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


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