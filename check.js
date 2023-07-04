// Example ratings for the Ghibli movies
const ratings = {
    spiritedAway: 97,
    myNeighborTotoro: 80,
    princessMononoke: 67,
    howlsMovingCastle: 91,
    kikisDeliveryService: 55,
    castleInTheSky: 78
  };
  
  // Calculate the fill width based on the ratings
  function calculateFillWidth(rating) {
    return rating + "%";
  }
  
  // Update the fill width and percentage display of the rating bar
  function updateRating(movieId, rating) {
    const fill = document.getElementById(movieId + "Rating");
    const percentage = document.getElementById(movieId + "Percentage");
  
    fill.style.width = calculateFillWidth(rating);
    percentage.textContent = rating + "%";
  }
  
  // Update ratings for each movie
  Object.keys(ratings).forEach(function(movie) {
    updateRating(movie, ratings[movie]);
  });
  