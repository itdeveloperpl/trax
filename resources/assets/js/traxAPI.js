// Mock endpoints to be changed with actual REST API implementation
let traxAPI = {
  getCarsEndpoint() {
    return '/api/cars'
  },
  getCarEndpoint(code) {
    return '/api/cars' + '/' + code;
  },
  addCarEndpoint() {
    return '/api/cars';
  },
  deleteCarEndpoint(code) {
    return '/api/cars' + '/' + code;
  },
  getTripsEndpoint() {
    return '/api/trips';
  },
  addTripEndpoint() {
    return 'api/trips'
  }
}

export {traxAPI};
