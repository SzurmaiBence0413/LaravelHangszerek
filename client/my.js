const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "http://127.0.0.1:8000/api/instruments", // <- Laravel API URL
      items: [],
      newItem: "",
      editId: null,
      editText: "",
      searchName: "",
    };
  },

  mounted() {
    this.fetchItems();
  },

  methods: {
    // 🟢 Összes elem (GET /api/instruments)
    async fetchItems() {
      const res = await fetch(this.apiUrl);
      const json = await res.json();
      this.items = json.data || [];
    },

    // 🟢 Új elem létrehozása (POST /api/instruments)
    async addItem() {
      if (!this.newItem.trim()) return;
      const res = await fetch(this.apiUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name: this.newItem }),
      });

      const json = await res.json();

      if (res.ok) {
        this.items.push(json.data);
        this.newItem = "";
      } else {
        alert(json.message || "Hiba az új elem létrehozásakor!");
      }
    },

    // 🟢 Egy elem megjelenítése (GET /api/instruments/{id})
    async showItem(id) {
      const res = await fetch(`${this.apiUrl}/${id}`);
      const json = await res.json();
      if (res.ok) {
        alert(`ID: ${json.data.id}\nNév: ${json.data.name}`);
      } else {
        alert(json.message || "Hiba: elem nem található!");
      }
    },

    // ✏️ Szerkesztés indítása
    startEdit(item) {
      this.editId = item.id;
      this.editText = item.name;
    },

    // 💾 Mentés (PUT /api/instruments/{id})
    async saveEdit(item) {
      if (!this.editText.trim()) return;
      const res = await fetch(`${this.apiUrl}/${item.id}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name: this.editText }),
      });

      const json = await res.json();
      if (res.ok) {
        const index = this.items.findIndex(i => i.id === item.id);
        this.items[index] = json.data.data; // Laravel nested data miatt
        this.editId = null;
        this.editText = "";
      } else {
        alert(json.message || "Hiba a mentés közben!");
      }
    },

    // 🗑️ Törlés (DELETE /api/instruments/{id})
    async deleteItem(id) {
      if (!confirm("Biztosan törlöd?")) return;
      const res = await fetch(`${this.apiUrl}/${id}`, { method: "DELETE" });
      const json = await res.json();
      if (res.ok) {
        this.items = this.items.filter(i => i.id !== id);
      } else {
        alert(json.message || "Hiba a törlés közben!");
      }
    },

    // 🔍 Egyedi: Keresés név alapján (client-side)
    searchItems() {
      const query = this.searchName.toLowerCase();
      return this.items.filter(i => i.name.toLowerCase().includes(query));
    },

    showAllItems() {
      this.searchName = "";
      this.fetchItems();
    },
  },
}).mount("#app");
