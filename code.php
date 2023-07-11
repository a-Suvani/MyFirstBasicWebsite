<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ghibli Movies</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url(background.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
    }

    #section {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin: 20px;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: white;
    }

    .nav-bar {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 18px;
    }

    #intro {
      position: absolute;
      left: 20px;
      bottom: 50%;
      transform: translateY(50%);
      color: white;
      font-size: 28px;
      width: 50%;
    }

    .typewriter {
      overflow: hidden;
      border-right: .15em solid white;
      white-space: nowrap;
      margin: 0 auto;
      letter-spacing: .15em;
      animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
    }

    @keyframes typing {
      from {
        width: 0
      }

      to {
        width: 100%
      }
    }

    @keyframes blink-caret {
      from,
      to {
        border-color: transparent
      }

      50% {
        border-color: white
      }
    }

    .flip-card {
      width: 300px;
      height: 300px;
      perspective: 1000px;
      margin-top: 20px;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }

    .flip-card-front {
      background-color: #f6f5f5;
      color: black;
    }

    .flip-card-back {
      background-color: #e7e7e7;
      color: black;
      transform: rotateY(180deg);
    }

    .card-content {
      padding: 20px;
      text-align: center;
    }

    .card-title {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .card-description {
      font-size: 16px;
      line-height: 1.5;
    }
  </style>
</head>

<body>
  <div id="section">
    <div class="logo">
      <a class="nav-bar" href="#">Ghibli Movies(ΦзΦ) ❤️</a>
    </div>

    <div id="intro">
      <h1 class="typewriter">Welcome to the enchanting world of Studio Ghibli!</h1>
    </div>

    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="assets/image/spirited_away.jpg" alt="Spirited Away" style="width:300px;height:300px;">
        </div>
        <div class="flip-card-back">
          <div class="card-content">
            <h2 class="card-title">Spirited Away</h2>
            <p class="card-description">Spirited Away is a captivating film directed by Hayao Miyazaki. It tells the story of Chihiro, a young girl who finds herself in a magical world filled with spirits and must navigate her way through to save her parents and return home.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="assets/image/my_neighbor_totoro.jpg" alt="My Neighbor Totoro" style="width:300px;height:300px;">
        </div>
        <div class="flip-card-back">
          <div class="card-content">
            <h2 class="card-title">My Neighbor Totoro</h2>
            <p class="card-description">My Neighbor Totoro is a heartwarming film directed by Hayao Miyazaki. It follows the story of two sisters who encounter friendly forest spirits, including the lovable Totoro, as they adjust to their new rural life.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="flip-card" style="position: absolute; bottom: 20px; right: 20px;">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="assets/image/princess_mononoke.jpg" alt="Princess Mononoke" style="width:300px;height:300px;">
        </div>
        <div class="flip-card-back">
          <div class="card-content">
            <h2 class="card-title">Princess Mononoke</h2>
            <p class="card-description">Princess Mononoke is an epic fantasy film directed by Hayao Miyazaki. It tells the tale of a young warrior who becomes involved in a struggle between the forest gods and the humans who seek to exploit the resources of the forest.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="flip-card" style="position: absolute; bottom: 20px; right: 340px;">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="assets/image/howls_moving_castle.jpg" alt="Howl's Moving Castle" style="width:300px;height:300px;">
        </div>
        <div class="flip-card-back">
          <div class="card-content">
            <h2 class="card-title">Howl's Moving Castle</h2>
            <p class="card-description">Howl's Moving Castle is a magical film directed by Hayao Miyazaki. It follows the journey of Sophie, a young girl transformed into an old woman, who enters a moving castle and encounters its eccentric owner, Howl.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="flip-card" style="margin-top: 20px;">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="assets/image/ponyo.jpg" alt="Ponyo" style="width:300px;height:300px;">
        </div>
        <div class="flip-card-back">
          <div class="card-content">
            <h2 class="card-title">Ponyo</h2>
            <p class="card-description">Ponyo is a delightful animated film directed by Hayao Miyazaki. It tells the story of a young fish named Ponyo who desires to become human and embarks on a magical adventure with a young boy named Sosuke.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Typewriter effect
    const welcomeText = document.querySelector(".typewriter");
    const text = "Welcome to the enchanting world of Studio Ghibli!";
    let index = 0;

    function typeWriter() {
      if (index < text.length) {
        welcomeText.innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 50);
      }
    }

    typeWriter();
  </script>
</body>

</html>
