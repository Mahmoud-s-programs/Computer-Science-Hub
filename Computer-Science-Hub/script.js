// Fetch news articles when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function () {
  fetchNews();
});

// Function to fetch news articles
function fetchNews() {
  const apiUrl =
    "https://newsdata.io/api/1/news?apikey=pub_40706eda2623274afa1aa2bf923fe54abeb51&q=Computer%20Science";

  fetch(apiUrl)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      displayNews(data.results);
    })
    .catch((error) => {
      console.error(
        "There has been a problem with your fetch operation:",
        error
      );
    });
}

// Function to display news articles
function displayNews(articles) {
    const newsSlider = document.querySelector('.news-slider');
    newsSlider.innerHTML = '';

    if (articles && articles.length > 0) {
        articles.forEach(article => {
            const articleDiv = document.createElement('div');
            articleDiv.className = 'news-item';
            
            let description = article.description ? article.description.substring(0, 100) + '...' : 'No description available.';
            
            let articleContent = `
                <h3>${article.title}</h3>
                <img src="${article.image_url ? article.image_url : 'ph.png'}" alt="Article image">
                <p>${description}</p>
                <a href="${article.link}" class="read-more">Read More</a>
            `;

            articleDiv.innerHTML = articleContent;
            newsSlider.appendChild(articleDiv);
        });
    } else {
        newsSlider.innerHTML = '<p>No news articles found.</p>';
    }
}

// Function to open resource tabs
function openResource(evt, resourceName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(resourceName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Automatically click on the first tab when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function() {
  document.querySelector(".tablinks").click();
});

// Validate contact form on submission
document.getElementById('contactForm').addEventListener('submit', function(event) {
  var name = document.getElementById('name').value.trim();
  var email = document.getElementById('email').value.trim();
  var message = document.getElementById('message').value.trim();
  var feedback = document.getElementById('feedback');

  if (name === '' || email === '' || message === '') {
    feedback.textContent = 'Please fill in all fields.';
    event.preventDefault();
  } else if (!isValidEmail(email)) {
    feedback.textContent = 'Please enter a valid email address.';
    event.preventDefault();
  }
});

// Function to validate email address using regular expression
function isValidEmail(email) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
