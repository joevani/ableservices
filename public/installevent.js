const INSTALL_THRESHOLD = 2;
let installPromptEvent;
const install = document.querySelector('.install');
self.addEventListener('beforeinstallprompt', (event) => {
      let previouslyEngaged = localStorage.getItem('engagement');
      if (!previouslyEngaged) {
        console.log('Install button hidden due to no prior engagement');
        return;
      }
      previouslyEngaged = parseInt(previouslyEngaged, 10);
      if (isNaN(previouslyEngaged) || previouslyEngaged < INSTALL_THRESHOLD) {
        console.log('Install button hidden due to not enough prior engagement');
        return;
      }
      event.preventDefault();
      installPromptEvent = event;
      install.disabled = false;
      install.hidden = false;
      });

      install.addEventListener('click', () => {
      install.disabled = true;
      install.hidden = true;
      installPromptEvent.prompt();
      installPromptEvent.userChoice.then((choice) => {
        if (choice.outcome === 'accepted') {
          console.log('User accepted the A2HS prompt');
        } else {
          console.log('User dismissed the A2HS prompt');
        }
        installPromptEvent = null;
      });
    });
