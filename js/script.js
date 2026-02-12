const imageGroups = {
    aakashgarg: [
        { src: 'img/topper/aakash1.JPG', text: 'AAKASH GARG - Rank 5 - UPSC CSE 2024' },
        { src: 'img/topper/aakash2.JPG', text: 'AAKASH GARG - Rank 5 - UPSC CSE 2024' },
        { src: 'img/topper/aakash3.JPG', text: 'AAKASH GARG - Rank 5 - UPSC CSE 2024' },
        { src: 'img/topper/aakash4.JPG', text: 'AAKASH GARG - Rank 5 - UPSC CSE 2024' }
    ],
    srishtigupta: [
        { src: 'img/topper/srishti1.JPG', text: 'SRISHTI GUPTA - Rank 728 - UPSC CSE 2024' },
        { src: 'img/topper/srishti2.JPG', text: 'SRISHTI GUPTA - Rank 728 - UPSC CSE 2024' },
        { src: 'img/topper/srishti3.JPG', text: 'SRISHTI GUPTA - Rank 728 - UPSC CSE 2024' },
        { src: 'img/topper/srishti4.JPG', text: 'SRISHTI GUPTA - Rank 728 - UPSC CSE 2024' }
    ],
    ravindrakumar: [
        { src: 'img/topper/ravindrakumar1.jpg', text: 'RAVINDRA KUMAR - Rank 138 - UPSC CSE 2023' },
        { src: 'img/topper/ravindrakumar2.jpg', text: 'RAVINDRA KUMAR - Rank 138 - UPSC CSE 2023' },
        { src: 'img/topper/ravindrakumar3.jpg', text: 'RAVINDRA KUMAR - Rank 138 - UPSC CSE 2023' },
        { src: 'img/topper/ravindrakumar4.jpg', text: 'RAVINDRA KUMAR - Rank 138 - UPSC CSE 2023' }
    ],
    ayushi: [
        { src: 'img/topper/ayushi1.png', text: 'AYUSHI PRADHAN - Rank 36 - UPSC CSE 2023' },
        { src: 'img/topper/ayushi2.png', text: 'AYUSHI PRADHAN - Rank 36 - UPSC CSE 2023' },
        { src: 'img/topper/ayushi3.JPG', text: 'AYUSHI PRADHAN - Rank 36 - UPSC CSE 2023' },
        { src: 'img/topper/ayushi4.jpg', text: 'AYUSHI PRADHAN - Rank 36 - UPSC CSE 2023' }
    ],
    krishanpal: [
        { src: 'img/topper/krishanpal1.jpg', text: 'KRISHANPAL RAJPUT - Rank 329 - UPSC CSE 2021' },
        { src: 'img/topper/krishanpal2.jpg', text: 'KRISHANPAL RAJPUT - Rank 329 - UPSC CSE 2021' },
        { src: 'img/topper/krishanpal3.jpg', text: 'KRISHANPAL RAJPUT - Rank 329 - UPSC CSE 2021' },
        { src: 'img/topper/krishanpal4.jpg', text: 'KRISHANPAL RAJPUT - Rank 329 - UPSC CSE 2021' }
    ],
    sachinsharma: [
        { src: 'img/topper/sachin1.JPG', text: 'SACHIN SHARMA - Rank 233 - UPSC CSE 2021' },
        { src: 'img/topper/sachin2.JPG', text: 'SACHIN SHARMA - Rank 233 - UPSC CSE 2021' },
        { src: 'img/topper/sachin3.JPG', text: 'SACHIN SHARMA - Rank 233 - UPSC CSE 2021' },
        { src: 'img/topper/sachin4.jpg', text: 'SACHIN SHARMA - Rank 233 - UPSC CSE 2021' }
    ]
};

let currentGroup = [];
let currentIndex = 0;

function openModal(groupName) {
    currentGroup = imageGroups[groupName];
    currentIndex = 0;
    updateModal(groupName);
}

function updateModal(groupName) {
    const modalImg = document.querySelector(`#${groupName} .modal-body img`);
    const modalText = document.querySelector(`#${groupName} .modal-body p`);
    
    modalImg.src = currentGroup[currentIndex].src;
    modalText.innerText = currentGroup[currentIndex].text;
}

function prevImage(groupName) {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : currentGroup.length - 1;
    updateModal(groupName);
}

function nextImage(groupName) {
    currentIndex = (currentIndex < currentGroup.length - 1) ? currentIndex + 1 : 0;
    updateModal(groupName);
}


// test .php
function showTable(year) {
      const allYears = ['2024', '2023', '2022'];
      allYears.forEach(y => {
        document.getElementById(y).style.display = y === year ? 'block' : 'none';
      });

      document.querySelectorAll('.tabs button').forEach(btn => {
        btn.classList.remove('active');
      });

      event.target.classList.add('active');
    }

    // popup form show on click
 
  function openform() {
    var overlay = $('<div id="overlay"></div>');
    overlay.appendTo(document.body);
    $("#overlay").fadeIn();

    // Remove previous animation class if already added
    $(".popup-onload").removeClass("show-popup");

    // Trigger reflow to restart animation
    void $(".popup-onload")[0].offsetWidth;

    // Add animation class and show popup
    $(".popup-onload").fadeIn().addClass("show-popup");

    // Close button functionality
    $(".close").click(function () {
      $(".popup-onload").fadeOut().removeClass("show-popup");
      $("#overlay").fadeOut(function () {
        $(this).remove();
      });
      return false;
    });
  }

  // Open popup every 4 minutes (240000 milliseconds)
  setInterval(function () {
    openform();
  }, 240000); // 4 minutes = 240000 ms

  window.onload = function () {
    const gifLoader = document.getElementById("gifLoader");
    const closeBtn = document.getElementById("close");

    // Show the GIF loader (remove d-none if present)
    gifLoader.classList.add("d-flex");

    // Manual close when X is clicked
    closeBtn.addEventListener("click", function () {
      gifLoader.classList.add("d-none");
    });
  };


  //--------------- function to show video adss on the right bottom side
  const videoIds = [
  '8QjNG-rOj3k',
  'z6eAMQAUerk',
  '1C3n5LJ2Oec',
  '35CwTT9fWik'
];
let currentIndex1 = 0;
let players = [];

function onYouTubeIframeAPIReady() {
  // Start after 5 sec
  setTimeout(() => {
    addOrRecycleVideo();
    setInterval(addOrRecycleVideo, 180000); // every 3 min
  }, 5000);
}

function createVideoItem(videoId) {
  const wrapper = document.createElement('div');
  wrapper.className = 'video-item';
  const playerId = 'player_' + Math.random().toString(36).substr(2, 9);
  wrapper.innerHTML = `<button class="close-btn">&times;</button>
    <div id="${playerId}"></div>`;
  document.getElementById('videoStack').appendChild(wrapper);

  const player = new YT.Player(playerId, {
    height: '168',
    width: '300',
    videoId: videoId,
    playerVars: {
      autoplay: 1,
      mute: 1,
      controls: 0,
      modestbranding: 1,
      rel: 0,
      showinfo: 0
    },
    events: {
      onReady: () => {
        pauseAllExcept(player);
        player.playVideo();
      }
    }
  });

  players.push({ wrapper, player });

  // Close button
  wrapper.querySelector('.close-btn').addEventListener('click', () => {
    wrapper.remove();
    players = players.filter(p => p.player !== player);
  });
}

function addOrRecycleVideo() {
  const stack = document.getElementById('videoStack');
  
  if (stack.childElementCount < 4) {
    // Add new video at bottom
    createVideoItem(videoIds[currentIndex1]);
  } else {
    // Recycle: move first video to bottom and load next video
    const first = players.shift(); // remove from start
    first.player.loadVideoById(videoIds[currentIndex1]);
    first.player.mute();
    pauseAllExcept(first.player);

    stack.removeChild(first.wrapper);  // remove from DOM
    stack.appendChild(first.wrapper);  // add at bottom

    players.push(first); // push to end
  }

  // Move to next video ID cyclically
  currentIndex1 = (currentIndex1 + 1) % videoIds.length;
}

function pauseAllExcept(activePlayer) {
  players.forEach(({ player }) => {
    if (player !== activePlayer) {
      player.pauseVideo();
    }
  });
}

// Unmute on first click anywhere
document.addEventListener('click', () => {
  players.forEach(({ player }) => {
    if (player.isMuted()) player.unMute();
  });
});