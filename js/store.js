// TicketStore.js

class TicketStore {
  constructor() {
    // Load tickets from localStorage or initialize empty array
    const storedTickets = localStorage.getItem('tickets');
    this.tickets = storedTickets ? JSON.parse(storedTickets) : [];
  }

  // Save tickets to localStorage
  _save() {
    localStorage.setItem('tickets', JSON.stringify(this.tickets));
  }

  // Add a new ticket
  addTicket({ title, description, assignee, status = 'Open' }) {
    const newTicket = {
      id: Date.now(), // unique id
      title,
      description,
      assignee,
      status
    };
    this.tickets.push(newTicket);
    this._save();
    return newTicket;
  }

  // Delete a ticket by id
  deleteTicket(id) {
    this.tickets = this.tickets.filter(t => t.id !== id);
    this._save();
  }

  // Update a ticket by id
  updateTicket(id, { title, description, assignee, status }) {
    const index = this.tickets.findIndex(t => t.id === id);
    if (index !== -1) {
      this.tickets[index] = { id, title, description, assignee, status };
      this._save();
    }
  }

  // Get a ticket by id
  getTicket(id) {
    return this.tickets.find(t => t.id === id);
  }

  // Get all tickets
  getTickets() {
    return this.tickets;
  }
}

// Example usage:
// const ticketStore = new TicketStore();

// // Add a ticket
// ticketStore.addTicket({
//   title: "Sample Ticket",
//   description: "This is a sample ticket",
//   assignee: "John Doe"
// });

// // Get all tickets
// console.log(ticketStore.getTickets());

// Delete a ticket
// ticketStore.deleteTicket(ticketId);

// Update a ticket
// ticketStore.updateTicket(ticketId, { title: "Updated", description: "Updated description", assignee: "Jane Doe", status: "Closed" });
