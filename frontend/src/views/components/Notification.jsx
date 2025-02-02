import React, { useState } from "react";

const Notification = () => {
  const [notifications, setNotifications] = useState([]);

  const pushNotification = (type, message) => {
    const id = Date.now();
    const newNotification = { id, type, message };

    setNotifications((prev) => [...prev, newNotification]);

    // Remove notification after 3 seconds
    setTimeout(() => {
      setNotifications((prev) => prev.filter((notif) => notif.id !== id));
    }, 3000);
  };

  const getIcon = (type) => {
    switch (type) {
      case "success":
        return (
          <div className="h-10 flex items-center text-green-400">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth="1.5"
              stroke="currentColor"
              className="w-6 h-6"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
          </div>
        );
      case "error":
        return (
          <div className="h-10 flex items-center text-red-400">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth="1.5"
              stroke="currentColor"
              className="w-6 h-6"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
          </div>
        );
      case "warning":
        return (
          <div className="h-10 flex items-center text-yellow-400">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth="1.5"
              stroke="currentColor"
              className="w-6 h-6"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
              />
            </svg>
          </div>
        );
      default:
        return null;
    }
  };

  return (
    <div className="notification-screen fixed left-1/2 -translate-x-1/2 flex justify-center h-fit w-fit overflow-hidden top-0 right-0 bottom-0 z-[999999]">
      <div className="notification-container mt-5 relative space-y-2">
        {notifications.map((notif) => (
          <div
            key={notif.id}
            className="notification flex items-center justify-start w-full max-w-[350px] md:max-w-[450px] z-50 py-1 px-6 bg-white rounded-full shadow-lg"
          >
            {getIcon(notif.type)}
            <p className="ml-3 truncate overflow-ellipsis text-gray-500 font-normal select-none">
              {notif.message}
            </p>
          </div>
        ))}
      </div>

      {/* Button examples to trigger notifications */}
      <div className="fixed bottom-5 flex space-x-2">
        <button
          onClick={() => pushNotification("success", "Data berhasil dihapus")}
          className="px-4 py-2 bg-green-500 text-white rounded"
        >
          Success
        </button>
        <button
          onClick={() => pushNotification("error", "Terjadi kesalahan")}
          className="px-4 py-2 bg-red-500 text-white rounded"
        >
          Error
        </button>
        <button
          onClick={() => pushNotification("warning", "Perhatian!")}
          className="px-4 py-2 bg-yellow-500 text-white rounded"
        >
          Warning
        </button>
      </div>
    </div>
  );
};

export default Notification;
