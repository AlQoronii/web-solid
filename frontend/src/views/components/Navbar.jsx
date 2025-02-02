import React, { useState } from 'react';

const Navbar = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  return (
<nav className="bg-white shadow-lg">
        <div className="w-full px-4 justify-between">
            <div className="flex justify-between">
                <div className="space-x-4">
                    <div className="flex">  
                        <a href="#" className="flex items-center py-5 px-2 text-gray-700">
                            <svg className="w-6 h-6 size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                              </svg>
                              
                            <span className="font-bold">Library</span>
                        </a>
                    </div>
                </div>

                <div className="hidden md:flex items-center space-x-1">
                    <a href="#" className="py-5 px-3 text-gray-500 font-bold hover:text-blue-900">Home</a>
                    <a href="#features" className="py-5 px-3 text-gray-500 font-bold hover:text-blue-900">Features</a>
                    <a href="#contact" className="py-5 px-3 text-gray-500 font-bold hover:text-blue-900">Contact</a>
                </div>

                <div className="hidden md:flex items-center space-x-1">
                    <a href="{{ route('login') }}" className="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
                </div>

                <div className="md:hidden flex items-center">
                    <button className="mobile-menu-button">
                        <svg className="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <div className="mobile-menu hidden md:hidden">
            <a href="#" className="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
            <a href="#features" className="block py-2 px-4 text-sm hover:bg-gray-200">Features</a>
            <a href="#contact" className="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
           
        </div>
    </nav>
    
  );
};

export default Navbar;