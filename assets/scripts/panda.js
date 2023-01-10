class PandaScript {
  constructor() {
    this.submissionMessage = document.querySelector(".submission-message");
    this.buttons = [...document.querySelectorAll(".button-block__button")];
    this.resultWall = document.querySelector(".results-block__value-wall");

    this.handleSubmissionMessage();
    this.handledEventListener();
  }

  handleSubmissionMessage() {
    if (!this.submissionMessage) return;

    setTimeout(() => {
      this.submissionMessage.remove();
    }, 2000);
  }

  handledEventListener() {
    this.buttons.forEach((button) => {
      button.addEventListener("click", () => {
        const action = button.getAttribute("action");

        this.#handleFetch(action);
      });
    });
  }

  async #handleFetch(action) {
    try {
      const response = await fetch("inc/fetch.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `action=${action}`,
      });
      const data = await response.json();

      console.log(data);

      this.#drawresultWall(data);
    } catch (error) {
      console.log("Error : ", error);
    }
  }

  #drawresultWall(data) {
    this.resultWall.innerHTML = ``;

    if (!data.length) {
      this.resultWall.innerHTML = `${this.resultWall.innerHTML} <li>No data! Please fill form.</li>`;
    }

    data.map((item) => {
      if ("a_table_value" in item)
        this.resultWall.innerHTML = `${this.resultWall.innerHTML} <li class="results-block__item">a_table_value : ${item.a_table_value}</li>`;
      if ("b_table_value" in item)
        this.resultWall.innerHTML = `${this.resultWall.innerHTML} <li class="results-block__item"> b_table_value : ${item.b_table_value}</li>`;
      if ("c_table_value" in item)
        this.resultWall.innerHTML = `${this.resultWall.innerHTML} <li class="results-block__item"> c_table_value : ${item.c_table_value}</li>`;
    });
  }
}

new PandaScript();
