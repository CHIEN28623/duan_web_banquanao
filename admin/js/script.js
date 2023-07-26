const tags = document.querySelectorAll(".tag");

const queryString = window.location.pathname;

const currentTag = queryString.split("/")[2];

tags.forEach((tag) => {
  if (tag.innerText.toLowerCase() === currentTag) {
    tag.classList.add("active");
  }
});
