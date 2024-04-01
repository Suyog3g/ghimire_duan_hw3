const app = Vue.createApp({
    data() {
        return {
            pokemons: [],
            loading: false
        };
    },
    computed: {
        sortedPokemons() {
            // Sort the pokemons array based on name or any other property
            return this.pokemons.slice().sort((a, b) => a.name.localeCompare(b.name));
        }
    },
    created() {
        this.fetchPokemons();
    },
    methods: {
        fetchPokemons() {
            this.loading = true;
            fetch('http://localhost:8888/ghimire_duan_hw3/backend-api/public/pokemons')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch Pokémon');
                    }
                    return response.json();
                })
                .then(data => {
                    this.pokemons = data.map(pokemon => ({
                        id: pokemon.id,
                        name: pokemon.name,
                        details: null
                    }));
                    this.loading = false;
                })
                .catch(error => {
                    console.error('Error fetching Pokémon:', error);
                    this.loading = false;
                });
        },
        showPokemonDetails(pokemonName) {
            const pokemon = this.pokemons.find(pokemon => pokemon.name === pokemonName);
            if (pokemon) {
                if (!pokemon.details) {
                    fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonName.toLowerCase()}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Failed to fetch Pokémon details');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Set additional details for the selected pokemon
                            pokemon.details = {
                                weight: data.weight,
                                height: data.height,
                                abilities: data.abilities.map(ability => ability.ability.name).join(', '),
                                sprites: data.sprites
                                // Add more properties as needed
                            };
                        })
                        .catch(error => {
                            console.error('Error fetching Pokémon details:', error);
                        });
                } else {
                    // Hide details if already shown
                    delete pokemon.details;
                }
            }
        }
        
    }
});

app.mount('#app');