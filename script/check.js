
const ratings = {
    spiritedAway: 97,
    myNeighborTotoro: 80,
    princessMononoke: 67,
    howlsMovingCastle: 91,
    kikisDeliveryService: 55,
    castleInTheSky: 78
  };
  

  function calculateFillWidth(rating) {
    return rating + "%";
  }
  
 
  function updateRating(movieId, rating) {
    const fill = document.getElementById(movieId + "Rating");
    const percentage = document.getElementById(movieId + "Percentage");
  
    fill.style.width = calculateFillWidth(rating);
    percentage.textContent = rating + "%";
  }
  

  Object.keys(ratings).forEach(function(movie) {
    updateRating(movie, ratings[movie]);
  });
  