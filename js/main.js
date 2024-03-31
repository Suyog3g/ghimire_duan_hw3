const app = Vue.createApp({
    data() {
        return {
            characters: [],
            selectedCharacter: null,
            loading: false,
            error: null
        };
    },
    created() {
        this.fetchCharacters();
    },
    methods: {
        fetchCharacters() {
            this.loading = true;
            fetch('https://swapi.dev/api/people/')
                .then(response => response.json())
                .then(data => {
                    this.characters = data.results;
                    this.loading = false;
                })
                .catch(error => {
                    this.error = 'Failed to fetch characters';
                    this.loading = false;
                    console.error('Error fetching characters:', error);
                });
        },
        getCharacterDetails(url) {
            this.loading = true;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    this.selectedCharacter = data;
                    this.loading = false;
                })
                .catch(error => {
                    this.error = 'Failed to fetch character details';
                    this.loading = false;
                    console.error('Error fetching character details:', error);
                });
        }
    }
});

app.mount('#app');