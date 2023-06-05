const app = Vue.createApp({
  data() {
    return {
      message: 'Hola Mundo'
    };
  },
  mounted() {

    this.requestNotificationPermission();
    
  },
  methods: {

    requestNotificationPermission() {
      if ('Notification' in window && 'serviceWorker' in navigator) {
        Notification.requestPermission().then(permission => {
          if (permission === 'granted') {
            navigator.serviceWorker.register('service-worker.js');
            navigator.serviceWorker.ready.then(registration => {
              registration.showNotification('¡Hola!', {
                body: 'Esto es una notificación push',
                icon: 'icon.png'
              });
            });
          }
        });
      }
    }
    
  }
});

app.mount('#app');
