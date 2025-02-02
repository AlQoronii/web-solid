import React, { useState } from 'react';

const BooksSection = ({ categories, allBooks }) => {
  const [selectedCategory, setSelectedCategory] = useState('all');

  const handleCategoryClick = (category) => {
    setSelectedCategory(category);
  };

  return (
    <section>
      <div className="flex justify-center">
        <ul className="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
          {categories.map((category, index) => (
            <li key={index} className="me-2">
              <a
                href="#"
                onClick={() => handleCategoryClick(category.category_name)}
                className={`inline-flex items-center justify-center p-4 border-b-2 ${
                  selectedCategory === category.category_name ? 'border-blue-500' : 'border-transparent'
                } rounded-t-lg hover:border-blue-300`}
              >
                {category.category_name}
              </a>
            </li>
          ))}
          <li className="me-2">
            <a
              href="#"
              onClick={() => handleCategoryClick('all')}
              className={`inline-flex items-center justify-center p-4 border-b-2 ${
                selectedCategory === 'all' ? 'border-blue-500' : 'border-transparent'
              } rounded-t-lg hover:border-blue-300`}
            >
              Show All
            </a>
          </li>
        </ul>
      </div>
      <div id="books-section">
        <h1 className="ml-24 text-2xl font-bold mb-5">Books</h1>
        <div className="grid grid-cols-6 gap-10 ml-24 mt-8">
          {allBooks
            .filter((book) => selectedCategory === 'all' || book.category.category_name === selectedCategory)
            .map((book, index) => (
              <img
                key={index}
                src={`/storage/books/images/${book.book_image}`}
                alt={book.book_title}
                className="w-48 h-64 object-cover rounded-lg"
              />
            ))}
        </div>
      </div>
    </section>
  );
};

export default BooksSection;