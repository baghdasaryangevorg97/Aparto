import { useState, useEffect } from "react";

function useSesionState(defaultValue, key) {
  const [value, setValue] = useState(() => {
    const sessionStorageValue = sessionStorage.getItem(key);

    return sessionStorageValue !== null
      ? JSON.parse(sessionStorageValue)
      : defaultValue;
  });

  useEffect(() => {
    sessionStorage.setItem(key, JSON.stringify(value));
  }, [key, value]);

  return [value, setValue];
}
export { useSesionState };
