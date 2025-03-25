<?php

namespace App\Policies;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OffrePolicy
{
    public function before(User $user,$ability){
        if ($user->role=="admin" && $ability=="delete"){
            return true;
        }
        return null;//apres null continuer vers les autres methodes Mais si on a cree false il arrete et sortis ne passer vers les autres methodes
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Offre $offre): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role==='recruteur';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Offre $offre): bool
    {
        // if ($user->id === $offre->user_id) {
        //     // Ici, tu peux mettre à jour l'offre
        //     // Par exemple, appeler une méthode qui gère la mise à jour
        //     return true;
        // }
        
        // // Si l'utilisateur ne correspond pas, retour false
        // return false;
        // return $user->id ==$offre->user_id && $this->create($user);
        return $user->id ==$offre->user_id && $this->create($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Offre $offre): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Offre $offre): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Offre $offre): bool
    {
        return false;
    }
}
