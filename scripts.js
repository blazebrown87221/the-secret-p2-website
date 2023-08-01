// scripts.js (JavaScript)
document.addEventListener("DOMContentLoaded", function () {
    // Check if the topic-form exists (on create_topic.html)
    const topicForm = document.getElementById("topic-form");
    if (topicForm) {
      topicForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission
  
        // Get form values
        const topicTitle = document.getElementById("topic-title").value;
        const topicContent = document.getElementById("topic-content").value;
  
        // Create new topic element
        const topicElement = document.createElement("div");
        topicElement.className = "topic";
        topicElement.innerHTML = `<h3>${topicTitle}</h3><p>${topicContent}</p>`;
  
        // Append the new topic to the forum-topics section on forum.html
        const forumTopics = document.getElementById("forum-topics");
        forumTopics.appendChild(topicElement);
  
        // Clear the form after submission
        topicForm.reset();
      });
    }
  });
  