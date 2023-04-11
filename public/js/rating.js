// Get the recipe rating container
const recipeRating = document.querySelector('.recipe-rating');

// Get the rating text container
const ratingText = document.querySelector('.rating-text');

// Get the current rating from the cookie (default to 0 if not found)
let currentRating = parseInt(getCookie('recipeRating')) || 0;

// Set the active class for the appropriate number of stars
for (let i = 0; i < 5; i++) {
  const star = recipeRating.children[i];
  if (i < currentRating) {
    star.classList.add('active');
  } else {
    star.classList.remove('active');
  }
}

// Add event listeners to the stars to set the rating and update the cookie
for (let i = 0; i < 5; i++) {
  const star = recipeRating.children[i];
  star.addEventListener('click', function() {
    currentRating = i + 1;
    setCookie('recipeRating', currentRating);
    updateRatingText();
  });
}

// Function to update the rating text
function updateRatingText() {
  const votes = parseInt(getCookie('recipeVotes')) || 0;
  ratingText.textContent = `(${votes} votes, ${currentRating} stars)`;
}

// Function to set a cookie value
function setCookie(name, value) {
  document.cookie = `${name}=${value}`;
}

// Function to get a cookie value
function getCookie(name) {
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
    const parts = cookies[i].split('=');
    if (parts[0].trim() === name) {
      return decodeURIComponent(parts[1]);
    }
  }
  return '';
}

// Update the rating text on page load
updateRatingText();
// Function to set a cookie value with an expiration date of 30 days

