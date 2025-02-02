import React from 'react';

const CTA = () => {
  return (
    <section className="bg-blue-500 text-white py-20">
      <div className="container mx-auto px-6 text-center">
        <h2 className="text-3xl font-bold mb-2">Join Our Library Today</h2>
        <p className="text-xl mb-8">Become a member and start exploring our extensive collection of resources.</p>
        <a href="#membership" className="bg-white text-blue-500 py-2 px-4 rounded-full hover:bg-gray-200">Become a Member</a>
      </div>
    </section>
  );
};

export default CTA;