//load comments when the page is loaded
document.addEventListener("DOMContentLoaded", async function() {
    
    // Load comments for each task
    const commentForms = document.querySelectorAll(".comment-form");

    commentForms.forEach(form => {
        const todo_id = form.querySelector(".btnAddComment").dataset.todoId;
        loadComments(todo_id);
    });

    // load done tasks
    const doneForms = document.querySelectorAll(".done-form");

    doneForms.forEach(form => {
        const todo_id = form.querySelector(".btnDone").dataset.todoId;
        loadDoneStatus(todo_id); // Load done status for each task
        });
});

// Add event listener to the comment form submit button
document.querySelectorAll(".btnAddComment").forEach(button => {
    button.addEventListener("click", function() {
    event.preventDefault(); // Prevent the default form submission
    //todo_id
    let todo_id = this.dataset.todoId;
    let text = this.closest(".comment-form").querySelector(".commentText").value;

    console.log(todo_id);
    console.log(text);

    //post to db with AJAX
    async function upload(formData) {
        try {
          const response = await fetch("AJAX/Savecomment.php", {
            method: "POST",
            body: formData,
          });
          console.log(response);
          const result = await response.json();
          console.log("Success:", result);
          loadComments(todo_id);
        } catch (error) {
          console.error("Error:", error);
        }
      }
      
      let formData = new FormData();
      
      formData.append("text", text);
      formData.append("todo_id", todo_id);
      
      upload(formData);   


    });
});

// Function to load comments for a specific task
async function loadComments(taskId) {
    const commentsRow = document.querySelector(`.comments-row[data-task-id="${taskId}"]`);
    const commentsList = commentsRow.querySelector(".comments-list");

    try {
        const response = await fetch(`AJAX/GetComments.php?task_id=${taskId}`);
        const comments = await response.json();

        commentsList.innerHTML = ""; // Clear existing comments

        comments.forEach(comment => {
            const li = document.createElement("li");
            li.textContent = comment.text;
            commentsList.appendChild(li);
        });
    } catch (error) {
        console.error("Error:", error);
    }
}

// Handle marking tasks as done
document.querySelectorAll(".done-form").forEach(form => {
    form.addEventListener("change", async function(event) {
        event.preventDefault(); // Prevent the default form submission
        const checkbox = event.target;
        const todo_id = checkbox.dataset.todoId;

        if (!checkbox.checked) {
            // Send an AJAX request to remove the task from the database
            const formData = new FormData();
            formData.append("todo_id", todo_id);
            
            try {
                const response = await fetch("AJAX/MarkTaskRemove.php", {
                    method: "POST",
                    body: formData
                });
                const result = await response.json();
                console.log("Success:", result);

                // Handle UI update if needed
            } catch (error) {
                console.error("Error:", error);
            }
        } else {
            // Task is being marked as done, execute your existing code
            const formData = new FormData();
            formData.append("todo_id", todo_id);
            
            try {
                const response = await fetch("AJAX/MarkTask.php", {
                    method: "POST",
                    body: formData
                });
                const result = await response.json();
                console.log("Success:", result);

                // Handle UI update if needed
            } catch (error) {
                console.error("Error:", error);
            }
        }
    });
});

// Function to load done status for a specific task
async function loadDoneStatus(taskId) {
    const checkbox = document.querySelector(`.BtnDone[data-todo-id="${taskId}"]`);
    
    try {
        const response = await fetch(`AJAX/GetDoneStatus.php?task_id=${taskId}`);
        const status = await response.json();
        //console.log(status);    
        
        if (status.done === 1) {
            checkbox.checked = true;
        } else {
            checkbox.checked = false;
        }
    } catch (error) {
        console.error("Error:", error);
    }
}

