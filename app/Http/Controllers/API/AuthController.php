

import React from "react";
import Menu from "./Menu";
import Footer from "./Footer";
import { useForm } from "react-hook-form";
import axios from "axios";

const UserPage = ({ handleLogout, user, setUser }) => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm({
    defaultValues: {
      name: user.name,
      email: user.email,
      role_id: user.role_id || 2, // Valeur par défaut pour role_id
    },
  });

  const onSubmit = async (data) => {
    try {
      // Ajout de role_id dans les données envoyées si non défini
      const updatedData = {
        ...data,
        role_id: data.role_id || 2, // Assure une valeur par défaut
      };

      const response = await axios.put(
        "http://127.0.0.1:8000/api/user/update",
        updatedData,
        {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${localStorage.getItem("access_token")}`,
          },
        }
      );

      if (response.status === 200) {
        setUser(response.data.data.user);
        alert("Profil mis à jour avec succès !");
      }
    } catch (error) {
      console.error("Erreur lors de la mise à jour :", error);
      alert("Une erreur est survenue. Veuillez réessayer.");
    }
  };

  return (
    <div>
      <Menu />
      <div className="container mt-5">
        <h2>Bienvenue sur votre page profil utilisateur, {user.name} !</h2>
        <form onSubmit={handleSubmit(onSubmit)} className="mt-4">
          <div className="form-group">
            <label>Nom</label>
            <input
              type="text"
              className="form-control"
              {...register("name", { required: "Le nom est obligatoire" })}
            />
            {errors.name && (
              <small className="text-danger">{errors.name.message}</small>
            )}
          </div>

          <div className="form-group mt-3">
            <label>Email</label>
            <input
              type="email"
              className="form-control"
              {...register("email", {
                required: "L'email est obligatoire",
                pattern: {
                  value: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                  message: "Format d'email invalide",
                },
              })}
            />
            {errors.email && (
              <small className="text-danger">{errors.email.message}</small>
            )}
          </div>

          {/* Optionnel : Ajout du champ Role */}
          <div className="form-group mt-3">
            <label>Rôle (optionnel)</label>
            <input
              type="number"
              className="form-control"
              {...register("role_id", {
                valueAsNumber: true,
              })}
              placeholder="Identifiant de rôle (ex. : 2)"
            />
          </div>

          <button type="submit" className="btn btn-primary mt-3">
            Valider les modifications
          </button>
        </form>

        <div className="actions mt-4">
          <button onClick={handleLogout} className="btn btn-danger">
            Se déconnecter
          </button>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default UserPage;
