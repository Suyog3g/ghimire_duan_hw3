const app = Vue.createApp({
    data() {
        return {
            pokemons: [],
            selectedPokemon: null,
            loading: false,
            error: null
        };
    },
    created() {
        this.fetchPokemons();
    },
    methods: {
        fetchPokemons() {
            this.loading = true;
            fetch('http://localhost:8888/ghimire_duan_hw3/backend-api/public/pokemons')
                .then(response => response.json())
                .then(data => {
                    this.pokemons = data.results;
                    this.loading = false;
                })
                .catch(error => {
                    this.error = 'Failed to fetch Pokémon';
                    this.loading = false;
                    console.error('Error fetching Pokémon:', error);
                });
        },
        getPokemonDetails(url) {
            this.loading = true;
            fetch('https://pokeapi.co/api/v2/pokemon/')
                .then(response => response.json())
                .then(data => {
                    this.selectedPokemon = {
                        name: data.name,
                        weight: data.weight,
                        height: data.height,
                        abilities: data.abilities.map(ability => ability.ability.name).join(', ')
                        // Add more properties as needed
                    };
                    this.loading = false;
                })
                .catch(error => {
                    this.error = 'Failed to fetch Pokémon details';
                    this.loading = false;
                    console.error('Error fetching Pokémon details:', error);
                });
        }
        
    }
});

app.mount('#app');
