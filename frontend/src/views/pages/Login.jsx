import React from "react";
import Notification from "./Notification"; // Import komponen Notification
// import "./App.css"; // Pastikan Tailwind diintegrasikan
import Background from "../assets/background-mountain.jpg"; // Import gambar background

const LoginPage = () => {
  return (
    <div className="font-sans text-gray-900 antialiased">
      {/* Notification Component */}
      <Notification />

    {/* Background Image and Login Container */}
        <div
          className="relative min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-cover bg-no-repeat"
          style={{ backgroundImage: `url(${Background})` }}
        >
          <div className="w-full max-w-80 sm:max-w-sm mt-6 px-8 py-10 bg-white shadow-md overflow-hidden rounded-lg">
            {/* Slot content goes here */}
          <h1 className="text-xl font-bold mb-4 text-center">Login</h1>
          <form>
            <div className="mb-4">
              <label htmlFor="email" className="block text-sm font-medium text-gray-700">
                Email Address
              </label>
              <input
                type="email"
                id="email"
                className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Enter your email"
              />
            </div>
            <div className="mb-4">
              <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                Password
              </label>
              <input
                type="password"
                id="password"
                className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                placeholder="Enter your password"
              />
            </div>
            <button
              type="submit"
              className="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition"
            >
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default LoginPage;
