function showTab(tabId) {
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => tab.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
  }

  function startVoiceInput() {
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.start();
    recognition.onresult = function(event) {
      document.getElementById('answer').value = event.results[0][0].transcript;
    };
  }
  function submitAnswer() {
    const answer = document.getElementById('answer').value.trim();
    if (answer === "") {
      alert("Please enter or speak your answer first.");
      return;
    }
  
    // Dummy feedback (real feedback will be AI-based later)
    document.getElementById('feedbackText').innerText =
      "Good attempt! Try to structure your answer better. Add some examples and be concise.";
  }