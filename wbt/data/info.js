document.addEventListener("DOMContentLoaded", function () {
  document.querySelector(".contuct").addEventListener("submit", function (e) {
    e.preventDefault();
    const firstname = document.getElementById("firstname").value;
    const lastname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    // Get selected project (radio)
    const projectInput = document.querySelector(
      'input[name="project"]:checked'
    );
    const project = projectInput
      ? document
          .querySelector(`label[for="${projectInput.id}"]`)
          .textContent.trim()
      : "";
    // Get checked categories (checkboxes)
    const categories = Array.from(
      document.querySelectorAll('input[name="category"]:checked')
    ).map((cb) => {
      const label = document.querySelector(`label[for="${cb.id}"]`);
      return label ? label.textContent.trim() : cb.value;
    });
    const consulting = document.getElementById("consulting").value;
    const username = firstname.toLowerCase();
    const password = Math.random().toString(20).slice(-4);

    localStorage.setItem(
      "contactData",
      JSON.stringify({
        firstname,
        lastname,
        email,
        project,
        categories,
        consulting,
        username,
        password,
      })
    );

    const popup = document.createElement("div");
    popup.style.position = "fixed";
    popup.style.top = "55%";
    popup.style.left = "50%";
    popup.style.transform = "translate(-50%, -55%)";
    popup.style.background =
      "linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%)";
    popup.style.padding = "36px 40px";
    popup.style.border = "2px solid #0099cc";
    popup.style.boxShadow = "0 8px 24px rgba(0,0,0,0.12)";
    popup.style.borderRadius = "18px";
    popup.style.textAlign = "left";
    popup.style.zIndex = "1500";
    popup.innerHTML = `
            <h3 style="color:#0066cc;margin-bottom:18px;">Your Credentials</h3>
            <p style="font-size:1.1em;"><strong>Username:</strong> ${username}</p>
            <p style="font-size:1.1em;"><strong>Password:</strong> ${password}</p>
            <button id="checkBtn" style="margin-top:18px;padding:8px 20px;background:#0066cc;color:#fff;border:none;border-radius:6px;cursor:pointer;">Check</button>
        `;
    document.body.appendChild(popup);

    document.getElementById("checkBtn").addEventListener("click", function () {
      window.location.href = "/wbt/html/info.html";
    });
  });
});
