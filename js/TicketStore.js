// ./js/TicketStore.js
class TicketStore {
  constructor() {
    const storedTickets = localStorage.getItem('tickets');
    this.tickets = storedTickets ? JSON.parse(storedTickets) : [];
  }

  _save() {
    localStorage.setItem('tickets', JSON.stringify(this.tickets));
  }

  _load() {
    const storedTickets = localStorage.getItem('tickets');
    this.tickets = storedTickets ? JSON.parse(storedTickets) : [];
  }

  addTicket({ title, description, assignee, status = 'Open' }) {
    const newTicket = {
      id: Date.now(),
      title,
      description,
      assignee,
      status
    };
    this.tickets.push(newTicket);
    this._save();
    return newTicket;
  }

  deleteTicket(id) {
    this.tickets = this.tickets.filter(t => t.id !== id);
    this._save();
  }

  updateTicket(id, { title, description, assignee, status }) {
    const index = this.tickets.findIndex(t => t.id === id);
    if (index !== -1) {
      this.tickets[index] = { id, title, description, assignee, status };
      this._save();
    }
  }

  getTicket(id) {
    this._load();
    return this.tickets.find(t => t.id === id);
  }

  getTickets() {
    this._load();
    console.log('Tickets loaded:', this.tickets);
    return this.tickets;
  }
}

// 👇 Make it available globally
window.TicketStore = TicketStore;
