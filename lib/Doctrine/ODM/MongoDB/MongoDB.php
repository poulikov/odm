<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\ODM\MongoDB;

/**
 * Wrapper for the PHP MongoDB class.
 *
 * @license 	http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link    	www.doctrine-project.org
 * @since   	1.0
 * @version     $Revision$
 * @author      Jonathan H. Wage <jonwage@gmail.com>
 */
class MongoDB
{
    /** The PHP MongoDB instance being wrapped */
    private $_mongoDB;

    /**
     * Create a new MongoDB instance which wraps a PHP MongoDB instance.
     *
     * @param MongoDB $mongoDB  The MongoDB instance to wrap.
     */
    public function __construct(\MongoDB $mongoDB)
    {
        $this->_mongoDB = $mongoDB;
    }

    /**
     * Get the MongoDB instance being wrapped.
     *
     * @return MongoDB $mongoDB
     */
    public function getMongoDB()
    {
        return $this->_mongoDB;
    }

    /** @proxy */
    public function __call($method, $arguments)
    {
        return call_user_func_array(array($this->_mongoDB, $method), $arguments);
    }
}